<?php
include('config.php');
include('menuAdmin2.php');
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Senarai Jawatan</title>
    <link rel="stylesheet" href="senarai.css">
</head>
<!-- FIXED: <style> block had <body> tag inside it -->
<style>
body { background-image: url(bg-puteri.jpg); background-size: cover; }
</style>
<body>
<center>
<!-- FIXED: typo "Senarai Jatawatan" -> "Senarai Jawatan" -->
<h2>Senarai Jawatan</h2>

<table border="1">
    <tr>
        <th width="100" align="center">ID Jawatan</th>
        <th width="200">Nama Jawatan</th>
        <th width="180" colspan="2">Tindakan</th>
    </tr>
<?php
$hasil = mysqli_query($con, "SELECT * FROM jawatan");
while ($row = mysqli_fetch_array($hasil)) {
?>
    <tr>
        <td align="center"><?php echo htmlspecialchars($row['IDJawatan']); ?></td>
        <td align="left"><?php echo htmlspecialchars($row['namaJawatan']); ?></td>
        <td align="center">
            <a href="jawatan_edit.php?IDJAWATAN=<?php echo urlencode($row['IDJawatan']); ?>"
               onclick="return confirm('Anda pasti?')"><u>Kemaskini</u></a>
        </td>
        <td align="center">
            <!-- FIXED: was IDJAWTAN (missing 'A') in query string -->
            <a href="jawatan_hapus.php?IDJAWATAN=<?php echo urlencode($row['IDJawatan']); ?>"
               onclick="return confirm('Anda pasti?')"><u>Padam</u></a>
        </td>
    </tr>
<?php } ?>
</table>
</center>
</body>
</html>
