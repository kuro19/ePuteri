<?php
include('config.php';
include('menuAdmin2.php');
?>

<?php
if (isset($_POST['update'])){
		$IDJawatan = $_POST['IDJAWATAN'];
	    $namaJawatan = $_POST['NAMAJAWATAN'];

//arahan untuk Kemaskini maklumat jadual kategori dalam PD
$update = "UPDATE jawatan SET IDJawatan = '$IDJawatan', namaJawatan = '$namaJawatan'
          WHERE IDJawatan = '$IDJawatan' ";

//buat sambungan dan query ke PD
$result = mysqli_query($con,$update);

//popup mesej jika rekod berjaya dikemaskini dan papar senarai Kategori
echo "<script>alert('Kemaskini Jawatan berjaya');
             window.location = 'senaraiJawatan.php'</script>";
}
?>

<?php
//Dapatkan Kod Kategori dari senarai Kategori
$IDJAWATAN = $_GET['IDJAWATAN'];

//buat sambungan dan query ke PD untuk dapatkan data dari jadual kategori
$sql = mysqli_query($con,"SELECT * FROM jawatan WHERE IDJawatan = $IDJAWATAN'");
while ($hasil =mysqli_fetch_array($sql)){
	//$kodkategori = $hasil['kodKategori'];
	$NAMAJAWATAN= $hasil['namaJawatan'];
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<body><center><h3 class="panjang">KEMASKINI MAKLUMAT JAWATAN</h3>
<main>
<form class="panjang" method="post">
<table border="0" align="center" style="font-size: 18px">
	</tr>
		<td>ID Jawatan:</td>
		<td><label><?php echo $IDJAWATAN; ?></label></td>
		<td><input type="hidden" name="IDJAWATAN" value="<?php echo $IDJAWATAN; ?>"/></td>
	</tr>
	<tr>
		<td>Nama Jawatan: </td>
		<td><input type="text" name="NAMAJAWATAN" value="<?php echo $namaJawatan; ?>"/></td>
	</tr>
</table>
<button type="submit" name="update">Kemaskini</button>
<button type="submit" name="cancle" onclick="history.back()">Batal</button>
</form>
</main>
</center>
</body>
</html>