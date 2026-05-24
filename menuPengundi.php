<?php
include ('config.php');
include ('pengesahan.php');

$nokp = $_SESSION['user'];
$nama = $_SESSION['name'];

?>
<!--HTML bermula-->
<html>
<link rel="stylesheet" href="menu_pengundi.css">
<style>
	body{
			background-image: url(putri.jpg);
		}
</style>
<head><center>
	<br><h2>Dashboard Pengundi</h2>
	<h5>No KP:&nbsp;<?php echo $nokp; ?> &nbsp; &nbsp;Nama: &nbsp;<?php echo $nama; ?></h5>
</center></head>
<body>

	<ul class="nav">
		<li><a href = "infoPengundi.php">Info Pengundi </a></li>
		<li><a href = "pilih_jawatan.php">Rekod Undian </a></li>
		<li><a href = "semak_undian.php">Semak Undian </a></li>
		<li><a href="logout.php"onclick="return confirm('Anda Pasti')">Log Keluar</a></li>
    </ul>
 </body>
 </html>