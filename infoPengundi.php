<?
//sambung ke pangkalan data
require('config.php'):
include('menuPengundi.php');

//dapatkan id login dari sesi login
$id = $_SESSION['user'];

//mendapatkan data pelajar daripada XAMPP
$pengundi = mysqli_query($con, "SELECT * FROM pengundi WHERE noKP = '$id'");
while($data = mysqli_fetch_array($pengundi)){
	//papar data dari XAMPP
	$noKP = $data['noKP'];
	$nama = $data['namaPengundi'];
	$passwd = $data['pwd'];
}
?>

<!DOCTYPE html>
</html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<style>
    body{
    	    background-image: url(bg_tealBlue.jpg);
    	}
</style>

<body><center><h3 class="daftar">MAKLUMAT PENGUNDI</h3></center>
<main>
<form class="daftar" action="updatePengundi.php" method="post">
<table border="0" align="center" style="font-size: 18px">
	<tr>
		<td>No KP: </td>
		<td><input type="text" name="NOKP" value="<?php echo $noKP; ?>" readonly/></td>
	</tr>
	<tr>
		<td>Nama Pengundi:</td>
		<td><input type="text" name="NAMA" value="<?php echo $nama; ?>" readonly/><td>
	</tr>
	<tr>
		<td>Kata Laluan:</td>
		<td><input type="text" name="PASSWD" value="<?php echo $passwd; ?>" readonly/><td>
	</tr>
</table>

        <button class="edit" type="submit" name="update">Kemaskini</button>
        <button class="salah" type="submit" name="cancle" onclick="history.back()">Batal</button>

</main>
</body>
</html>