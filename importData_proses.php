<?php
include('config.php');
include('menuAdmin2.php'); // FIXED: was menuAdmin.php
?>
<!DOCTYPE html>
<html lang="ms">
<head><meta charset="UTF-8"></head>
<link rel="stylesheet" href="senarai.css">
<center>
<table>
    <caption>MAKLUMAT DATA IMPORT</caption>
    <tr>
        <th>Nombor KP</th>
        <th>Nama Pengundi</th>
        <th>Kata Laluan</th>
        <th>Status</th>
    </tr>
<?php
$fail  = fopen("data.txt", "r");
$hasil = false;
while (!feof($fail)) {
    $line  = fgets($fail);
    $medan = explode(',', trim($line));
    if (count($medan) < 4) continue; // skip incomplete lines

    $noKP         = mysqli_real_escape_string($con, trim($medan[0]));
    $namaPengundi = mysqli_real_escape_string($con, trim($medan[1]));
    $pwd          = mysqli_real_escape_string($con, trim($medan[2]));
    $status       = mysqli_real_escape_string($con, trim($medan[3]));

    $sql   = "INSERT INTO pengundi(noKP,namaPengundi,pwd,sts) VALUES('$noKP','$namaPengundi','$pwd','$status')";
    $hasil = mysqli_query($con, $sql);
    ?>
    <tr>
        <td><?php echo htmlspecialchars($noKP); ?></td>
        <td><?php echo htmlspecialchars($namaPengundi); ?></td>
        <td><?php echo htmlspecialchars($pwd); ?></td>
        <td><?php echo htmlspecialchars($status); ?></td>
    </tr>
    <?php
}
fclose($fail);

if ($hasil) {
    echo "<script>alert('Rekod berjaya diimport');</script>";
} else {
    echo "<script>alert('Rekod tidak berjaya diimport');</script>";
}
?>
</table>
</center>
</html>
