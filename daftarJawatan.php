<?php
include('config.php');
include('menuAdmin2.php');
?>

<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<style>
	input[type="text"] {
		  width: 200px;
		  padding: 5px;
		  margin: 5px;
		}

	body{
		  background-image: url(bg_digital.jpg);
		}
</style>

<h3 class="daftar">DAFTAR JAWATAN</h3>
<form class="daftar" action="daftarJawatan_proses.php" method="post">
<table>
	<tr>
		<td>ID Jawatan</td>
		<td><input type="text" name="IDJAWATAN"></td>
	</tr>

	<tr>
		<td> Nama Jawatan </td>
		<td><input type="text" name="NAMAJAWATAN"></td>
	</tr>

</table>
<button class="tambah" type="submit">TAMBAH</button>
</form>
</html>