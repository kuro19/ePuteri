<?php
include('config.php');
include('menuPengundi.php');

//DAPATKAN ID Pengundi 
$noKP = $_SESSION['user'];

//Dapatkan data daripada XAMPP
$pengundi = mysqli_query($con, "SELECT * FROM pengundi WHERE noKP = $noKP");
while($data = mysqli_fetch_array($pengundi)){
	//papar data dari XAMPP
	$noKP = $data['noKP'];
	$nama = $data['namaPengundi'];
	$passwd = $data['pwd'];
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<body><center><h3 class="panjang">KEMASKINI PENGUNDI</h3></center>
<main>
<form class="panjang" action="updatePengundi2.php" method="post">
<table border="0" align="center" style="font-size: 18px">
	<tr>
		<td>No KP:</td>
		<td><label><?php echo $noKP; ?></label>
		<td><input type="hidden" name="NOKP" value="<?php echo $noKP; ?>" /></td>
	</tr>
	<tr>
		<td>Nama Pengundi:</td>
		<td><input type="text" name="NAMA" value="<?php echo $nama; ?>" /></td>
	</tr>

	<tr>
		<td>Kata Laluan:</td>
		<td><input type="text" name="PASSWD" value="<?php echo $passwd; ?>" /></td>
	</tr>
</table>
<button type="submit" name="update">Simpan</button>
<button type="submit" name="salah" onclick="history.back()">Batal</button>
</main>
</body>
</html>