<?php
include('config.php');
include('menuPengundi.php');

$noKP = $_SESSION['user'];
$nama = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Semak Undian</title>
    <link rel="stylesheet" href="senarai.css">
    <link rel="stylesheet" href="button.css">
    <link rel="stylesheet" href="semak_undian.css">
</head>
<body>
<center>
<h2>SENARAI UNDIAN</h2>
<h5>No KP:&nbsp;<?php echo htmlspecialchars($noKP); ?> &nbsp;&nbsp;Nama:&nbsp;<?php echo htmlspecialchars($nama); ?></h5>

<table width="80%" border="1">
    <tr>
        <th width="20">Bil</th>
        <th width="50">No Siri</th>
        <th width="60">Tarikh</th>
        <th width="40">Masa</th>
        <th width="50">Gambar</th>
        <th width="100">Info Calon</th>
        <th width="70">Jawatan</th>
    </tr>

<?php
$bil = 1;
$noKP_safe = mysqli_real_escape_string($con, $noKP);

// FIXED: was ORDER BY tarik (typo — missing h), and was mysqli_query($con.$sql) — dot not comma
$sql  = "SELECT * FROM undian WHERE noKP = '$noKP_safe' ORDER BY tarikh ASC";
$data = mysqli_query($con, $sql);

while ($hasil = mysqli_fetch_array($data)) {
    $noSiri  = $hasil['noSiri'];
    $IDCalon = $hasil['IDCalon'];
    $tarikh  = $hasil['tarikh'];
    $masa    = $hasil['masa'];

    $IDCalon_safe = mysqli_real_escape_string($con, $IDCalon);
    $data2 = mysqli_query($con, "SELECT * FROM calon WHERE IDCalon = '$IDCalon_safe'");
    $hasil2 = mysqli_fetch_array($data2);
    $namaCalon  = $hasil2['namaCalon'] ?? '';
    $kelas      = $hasil2['kelas']     ?? '';
    $gambar     = $hasil2['gambar']    ?? '';
    $IDJawatan  = $hasil2['IDJawatan'] ?? '';

    $IDJawatan_safe = mysqli_real_escape_string($con, $IDJawatan);
    $data3 = mysqli_query($con, "SELECT * FROM jawatan WHERE IDJawatan = '$IDJawatan_safe'");
    $hasil3 = mysqli_fetch_array($data3);
    $namaJawatan = $hasil3['namaJawatan'] ?? '';
?>
    <tr>
        <td><?php echo $bil; ?></td>
        <td><?php echo htmlspecialchars($noSiri); ?></td>
        <td><?php echo htmlspecialchars($tarikh); ?></td>
        <td><?php echo htmlspecialchars($masa); ?></td>
        <td><img width="80" height="80" src="<?php echo htmlspecialchars($gambar); ?>"></td>
        <td align="center">
            <div class="candidate-info">
                <?php echo htmlspecialchars($IDCalon); ?><br>
                <?php echo htmlspecialchars($namaCalon); ?><br>
                <?php echo htmlspecialchars($kelas); ?>
            </div>
        </td>
        <td align="center">
            <div class="candidate-info">
                <?php echo htmlspecialchars($IDJawatan); ?><br>
                <?php echo htmlspecialchars($namaJawatan); ?>
            </div>
        </td>
    </tr>
<?php
    $bil++;
}
?>
</table>
<br>
<button class="cetak" onclick="window.print()">Cetak</button>
</center>
</body>
</html>
