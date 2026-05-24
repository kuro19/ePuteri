<?php
include('config.php');
include('menuAdmin2.php');
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Senarai Calon</title>
    <link rel="stylesheet" href="senarai.css">
</head>
<!-- FIXED: <style> block had <body> tag inside it (same pattern as other files) -->
<style>
body { background-image: url(bg-puteri.jpg); background-size: cover; }
</style>
<body>
<center>
<h2>Senarai Calon</h2>

<table width="80%" border="1">
    <tr>
        <th width="50">Bil</th>
        <th width="100">ID Calon</th>
        <th width="200">Nama Calon</th>
        <th width="100">Kelas</th>
        <th width="200">Gambar</th>
        <th width="100">Jawatan</th>
        <th colspan="2" width="100">Tindakan</th>
    </tr>
<?php
$hasil = mysqli_query($con, "SELECT c.*, j.namaJawatan FROM calon c LEFT JOIN jawatan j ON c.IDJawatan = j.IDJawatan");
$no = 1;
while ($row = mysqli_fetch_array($hasil)) {
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo htmlspecialchars($row['IDCalon']); ?></td>
        <td><?php echo htmlspecialchars($row['namaCalon']); ?></td>
        <td><?php echo htmlspecialchars($row['kelas']); ?></td>
        <td><img src="<?php echo htmlspecialchars($row['gambar']); ?>" width="80" height="50"></td>
        <!-- FIXED: was running a separate query in a loop for jawatan - now uses JOIN -->
        <td><?php echo htmlspecialchars($row['namaJawatan']); ?></td>
        <td><a href="calon_edit.php?IDCALON=<?php echo urlencode($row['IDCalon']); ?>"
               onclick="return confirm('Anda pasti?')"><u>Kemaskini</u></a></td>
        <td><a href="calon_hapus.php?IDCALON=<?php echo urlencode($row['IDCalon']); ?>"
               onclick="return confirm('Anda pasti?')"><u>Padam</u></a></td>
    </tr>
<?php
    $no++;
}
?>
</table>
</center>
</body>
</html>
