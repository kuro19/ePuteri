<?php
include('config.php');
include('menuAdmin2.php');

//dapatkan data Jawatan daripada XAMPP
if(isset($_POST['IDJAWATAN'])){
	$IDJAW = $_POST['IDJAWATAN'];
	//$sql = "SELECT * FROM calon JOIN jawatan ON calon.IDJawatan = jawatan.IDJawatan
	//        WHERE calon.IDJawatan = '$IDJAW'";
	$sql = "SELECT * FROM calon WHERE IDJawatan = '$IDJAW'";
	$data = mysqli_query($con,$sql);

	//semak sama ada data ada dalam xampp
	if(mysqli_num_rows($data)>0){
	    echo"<script>alert('Data carian ditemui.');
	              window.location = 'senarai_carian.php?IDJAWATAN=$IDJAW'</script>";
	}
	else{
	  echo "Carian calon tiada dalam senarai.";
	}
}
?>

<html> 
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<style>
body{
	        background-image: url(bg_digital.jpg);
	    }
<body>
</style>

<h3 class="carian">CARIAN MENGIKUT JAWATAN</h3>

<form class="carian" method="post">
	<center>
    <table>
    	<tr>
    		<td>Jawatan</td>
    		<td>
    			<select class="Jawatan" name="IDJAWATAN">
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