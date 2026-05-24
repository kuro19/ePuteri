<?php
include('config.php');
include('menuAdmin2.php');

if (isset($_POST['update'])){
	$nokp = $_POST['NOKP'];
	$nama = $_POST['NAMA'];
	$pass = $_POST['PASSWD'];

	//KEMASKINI DATA DALAM JADUAL PENGUNDI DALAM XAMPP
	$update = "UPDATE pengundi SET noKP = '$nokp', namaPengundi = '$nama',
	pwd = '$pass' WHERE noKP = '$nokp' ";
	$result = mysqli_query($con,$update);

	//papar mesej jika rekod berjaya dikemaskini
	echo "<script>alert('Kemaskini maklumat pengundi berjaya');
	         window.location = 'senaraiPengundi.php'</script>",
}
?>

<?php
//DAPATKAN ID PENGUNDI
$NOKP = $_GET['NOKP'];
$sql = mysqli_query($con, "SELECT * FROM pengundi WHERE noKP = $NOKP)"
while($hasil = mysqli_fetch_array($sql)){
	//dapatkan data daripada XAMPP
	$NAMA = $hasil['namaPengundi'];
	$PWD = $hasil['PWD'];
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<body><center><h3 class="panjang">KEMASKINI MAKLUMAT PENGUNDI</h3>
<main>
<form class="panjang" method="post">
<table border="0" align="center" style="font-size: 18px">
	<tr>
		<td>Nombor KP:</td>
		<td><label><?php echo $NOKP; ?></label></td>
		<td><input type="hidden" name="NOKP" value="<?php echo $NOKP; ?>"/></td>
	</tr>
	<tr>
		<td>Nama Pelanggan:</td>
		<td><input type="text" name="NAMA" value="<?php echo $NAMA; ?>"/></td>
	</tr>
	<tr>
		<td>Kata Laluan:</td>
		<td><input type="text" name="PASSWD" value="<?php echo $password; ?>"/></td>
	</tr>
</table>
<button type="submit" name="update">Update</button>
<button type="submit" name="cancle" onclick="history.back()">Batal</button>
</form>
</main>
</center>
</body>
</html>