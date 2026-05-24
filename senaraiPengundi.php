<?php
include('config.php');
include('menuAdmin2.php');
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="senarai.css">
<style>
body{
	background-image: url(bg_digital.jpg);
    }
 <body>
</style>

<body>
<center><h2>Senarai Pengundi</h2>

<!--papar jadual-->
<table border='1'>
	<tr>
		<th>Bil</th>
		<th>Nombor KP</th>
		<th>Nama Pengundi</th>
		<th>Kata Laluan</th>
		<th>status</th>
		<th colspan="2">Tindakan</th>
	</tr>

<?php
$no = 1;
//membuat query untuk dapatkan data
$hasil = mysqli_query($con,"SELECT * FROM pengundi");

//umpukkan data yang ditemui ke dalam tatasusunan $row
while($row = mysqli_fetch_array($hasil))
{
	$status = $row['sts'];
	if ($status == "USER"){
	?>
	<!--papar data daripada p/data di dalam jadual -->
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['noKP']; ?></td>
		<td><?php echo $row['namaPengundi']; ?></td>
		<td><?php echo $row['pwd']; ?></td>
		<td><?php echo $row['sts']; ?></td>
		<td><a href="pengundi_edit.php?NOKP=<?php echo $row['noKP']; ?>"
			         onclick="return confirm('Anda pasti?')"><u>Kemaskini</u></a></td>
		<td><a href="pengundi_hapus.php?NOKP=<?php echo $row['noKP']; ?>"
			            onclick="return confirm('Anda pasti?')"><u>Padam</u></a></td>
	</tr>
	<?php
	  ++$no;
	}
}
?>
</table>
</center>
</body>
</html>