<?php
include('config.php');
include('menuAdmin2.php');

if (isset($_POST['update'])) {
    $IDCalon   = mysqli_real_escape_string($con, $_POST["IDCALON"]);
    $namacalon = mysqli_real_escape_string($con, $_POST["NAMACALON"]);
    $kelas     = mysqli_real_escape_string($con, $_POST["KELAS"]);
    $gambar    = mysqli_real_escape_string($con, $_POST["GAMBAR"]);
    $IDJawatan = mysqli_real_escape_string($con, $_POST["IDJAWATAN"]);

    // FIXED: variable name mismatch — used $namaCalon but assigned to $namacalon
    $update = "UPDATE calon SET namaCalon='$namacalon', kelas='$kelas',
               gambar='$gambar', IDJawatan='$IDJawatan' WHERE IDCalon='$IDCalon'";
    $result = mysqli_query($con, $update);

    // FIXED: echo statement ended with comma instead of semicolon
    echo "<script>alert('Kemaskini maklumat Calon berjaya');
                 window.location='senaraiCalon.php';</script>";
}

$IDCALON = mysqli_real_escape_string($con, $_GET['IDCALON'] ?? '');
$sql     = mysqli_query($con, "SELECT * FROM calon WHERE IDCalon = '$IDCALON'");
$hasil   = mysqli_fetch_array($sql);
$NAMA      = $hasil['namaCalon'] ?? '';
$KELAS     = $hasil['kelas']     ?? '';
$GAMBAR    = $hasil['gambar']    ?? '';
$IDJAWATAN = $hasil['IDJawatan'] ?? '';
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Kemaskini Calon</title>
    <link rel="stylesheet" href="borang.css">
    <link rel="stylesheet" href="button.css">
</head>
<body>
<center>
<h3 class="panjang">KEMASKINI MAKLUMAT CALON</h3>
<main>
<form class="panjang" method="post">
<table border="0" style="font-size:18px">
    <tr>
        <td>ID Calon:</td>
        <td><label><?php echo htmlspecialchars($IDCALON); ?></label></td>
        <td><input type="hidden" name="IDCALON" value="<?php echo htmlspecialchars($IDCALON); ?>"></td>
    </tr>
    <tr>
        <td>Nama Calon:</td>
        <!-- FIXED: input type=" text" had extra space causing it to be invalid -->
        <td><input type="text" name="NAMACALON" value="<?php echo htmlspecialchars($NAMA); ?>"></td>
    </tr>
    <tr>
        <td>Kelas:</td>
        <td><input type="text" name="KELAS" value="<?php echo htmlspecialchars($KELAS); ?>"></td>
    </tr>
    <tr>
        <td>Gambar (semasa):</td>
        <td><img src="<?php echo htmlspecialchars($GAMBAR); ?>" width="80" height="50"></td>
    </tr>
    <tr>
        <td>Gambar (baru):</td>
        <td><input type="file" name="GAMBAR" accept=".jpeg,.jpg,.png"></td>
    </tr>
    <tr>
        <td>ID Jawatan:</td>
        <td>
            <select name="IDJAWATAN">
                <?php
                $sql2 = mysqli_query($con, "SELECT * FROM jawatan");
                while ($jawatan = mysqli_fetch_array($sql2)) {
                    $selected = ($jawatan['IDJawatan'] == $IDJAWATAN) ? "selected" : "";
                    echo "<option value='" . htmlspecialchars($jawatan['IDJawatan']) . "' $selected>"
                         . htmlspecialchars($jawatan['namaJawatan']) . "</option>";
                }
                ?>
            </select>
        </td>
    </tr>
</table>
<button type="submit" name="update">Kemaskini</button>
<!-- FIXED: cancel button name was 'cancle' (typo) -->
<button type="button" name="cancel" onclick="history.back()">Batal</button>
</form>
</main>
</center>
</body>
</html>
