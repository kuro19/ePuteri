<?php
require('config.php');
include('menuAdmin2.php');

$IDJAWATAN = $_GET['IDJAWATAN'];

//membuat query untuk dapatkan data
$hasil = mysqli_query($con,"SELECT * FROM jawatan WHERE IDJawatan = '$IDJAWATAN'");
while ($data = mysqli_fetch_array($hasil)){
	$NAMAJAWATAN = $data['namaJawatan'];
}
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
<center><h2>Senarai Calon berdasarkan Jawatan</h2><br>
	   <h4><?php echo $NAMAJAWATAN; ?></h4>

<!--papar jadual-->
<table width="90%"border='1'>
	<tr>
		<th>Bil.</th>
		<th>ID Calon</th>
		<th>Nama Calon</th>
		<th>Kelas</th>
		<th>Gambar</th>
	</tr>

<?php
//membuat query untuk dapatkan data
$hasil = mysqli_query($con,"SELECT * FROM calon WHERE IDJawatan = '$IDJAWATAN'");
$no = 1;

//umpukkan data yang ditemui ke dalam tatasusunan $row
while($row = mysqli_fetch_array($hasil))
{
    ?>
    <!--papar data di dalam jadual-->
    <tr>
    	<td><?php echo $no; ?></td>
    	<td><?php echo $row['IDCalon']; ?></td>
    	<td><?php echo $row['namaCalon']; ?></td>
    	<td><?php echo $row['kelas']; ?></td>
    	<td width="150px"><img src="<?php echo $row['gambar']; ?>" width="80px" height="50px"></td>
    </tr>
    <?php
       $no++;
    }
    ?>
</table>
<br><button class="cetak" onclick="window.print()">Cetak</button>
</center>
</body>
</html>