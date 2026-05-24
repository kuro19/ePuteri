<?php
include('config.php');
include('menuPengundi.php');
session_start(); // FIXED: was commented out — session not started means $_SESSION is empty

$noKP = $_SESSION['user'];
$nama = $_SESSION['name'];

$sql   = "SELECT noSiri FROM undian";
$data  = mysqli_query($con, $sql);
$total = mysqli_num_rows($data);
$noSiri = 1000 + $total + 1;

$tarikh = date("d-m-Y");
$masa   = date('H:i');

$idjaw   = mysqli_real_escape_string($con, $_GET['IDJAWATAN'] ?? '');
$sql2    = "SELECT namaJawatan FROM jawatan WHERE IDJawatan = '$idjaw'";
$data2   = mysqli_query($con, $sql2);
$jawatan = '';
if ($row = mysqli_fetch_array($data2)) {
    $jawatan = $row['namaJawatan'];
}
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Pilih Calon</title>
    <link rel="stylesheet" href="paparCalon.css">
    <link rel="stylesheet" href="button.css">
    <style>
        .info-box {
            border: 2px solid #333;
            padding: 15px;
            margin: 20px auto;
            border-radius: 8px;
            background-color: #f9f9f9; /* FIXED: was 'background-colour' (invalid) */
            font-family: Arial, sans-serif;
            width: 300px;
        }
        .info-box h2 {
            margin-top: 0;
            color: #444;
            font-size: 16px;
        }
        .info-box p {
            margin: 5px 0;
            font-size: 14px;
        }
        body {
            background-image: url(bg-puteri.jpg); /* FIXED: was bg_tealBlue.jpg (file not in archive) */
            background-size: cover;
        }
        table.calon { border-collapse: collapse; }
        td.calon { padding: 15px; text-align: center; vertical-align: top; }
    </style>
</head>
<body>
<center>

<div class="info-box">
    <h2><strong>No Siri: <?php echo $noSiri; ?></strong></h2>
    <p><strong>Tarikh: <?php echo $tarikh; ?> &nbsp;&nbsp; Masa: <?php echo $masa; ?></strong></p>
</div>

<h2>Senarai Calon berdasarkan Jawatan</h2>
<h2><?php echo htmlspecialchars($jawatan); ?></h2>

<form method="POST" action="rekod_undian.php">
    <table class="calon">
    <?php
    $hasil = mysqli_query($con, "SELECT * FROM calon WHERE IDJawatan = '$idjaw'");
    $bil = 0; // FIXED: was missing semicolon — syntax error

    while ($calon = mysqli_fetch_array($hasil)) {
        $IDCalon   = $calon['IDCalon'];
        $namaCalon = $calon['namaCalon'];
        $kelas     = $calon['kelas'];
        $gambar    = $calon['gambar'];

        if ($bil % 3 == 0) {
            echo "<tr class='calon'>";
        }

        echo "<td class='calon'>
                <img width='150' height='150' src='" . htmlspecialchars($gambar) . "'><br><br>
                " . htmlspecialchars($namaCalon) . "<br>" . htmlspecialchars($kelas) . "<br><br>
                <input type='radio' name='IDCALON' value='" . htmlspecialchars($IDCalon) . "' required>
              </td>";

        $bil++;
        if ($bil % 3 == 0) {
            echo "</tr>";
        }
    }
    if ($bil % 3 != 0) {
        echo "</tr>"; // close last incomplete row
    }
    ?>
    </table>

    <input type="hidden" name="NOKP"      value="<?php echo htmlspecialchars($noKP); ?>">
    <input type="hidden" name="NOSIRI"    value="<?php echo $noSiri; ?>">
    <input type="hidden" name="IDJAWATAN" value="<?php echo htmlspecialchars($idjaw); ?>">
    <input type="hidden" name="TARIKH"    value="<?php echo htmlspecialchars($tarikh); ?>">
    <input type="hidden" name="MASA"      value="<?php echo htmlspecialchars($masa); ?>">

    <br><br>
    <button class="undi" type="submit" name="submit">Undi</button>
</form>
</center>
</body>
</html>
