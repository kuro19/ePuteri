<?php
include('config.php');
include('menuPengundi.php');

//dapatkan id login dari sesi login
$noKP = $_SESSION['user'];

//dapatkan data jawatan daripada XAMPP
if(isset($_POST['IDJAWATAN'])){
	$idjawatan = $_POST['IDJAWATAN'];
	$sql = "SELECT * FROM calon WHERE IDJawatan = '$idjawatan'";
	$data = mysqli_query($con,$sql);

	//semak sama ada item berdasarkan kategori yang dipilih
	if(mysqli_num_rows($data) > 0){
		echo "<script>alert('Senarai calon ditemui.');
		          window.location = 'pilihundi.php?IDJAWATAN=$idjawatan'</script>";
	}
	else{
		echo "<script>alert('Tiada item dalam senarai.');
		           window.location = 'pilih_jawatan.php'</script>";
	}
}
?>

</html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<style>
	body{
		    background-image: url(bg_tealBlue.jpg);
		}
</style>

<h3 class="carian">SILIH PILIH JAWATAN</h3>

<form class="carian" method="post">
	<center>
	<table>
		<tr>
			<td>Jawatan</td>
			<td>
				<select class ="jawatan" name="IDJAWATAN">
					<option value="">--Pilih Jawatan --</option>
					<?php
					$sql= "SELECT * from jawatan";
					$query = mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($query)){
						echo "<option value= '$row[IDJawatan]'>$row[namaJawatan]</option>";
					}
				    ?>
				</select>
			</td>
		</tr>
	</table>
	<button class="tambah" type="submit">Cari</button>
    </center>
</form>
</html>