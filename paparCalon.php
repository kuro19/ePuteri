<?php
include('config.php');
?>

<link rel="stylesheet" href ="senarai.css">
<link rel="stylesheet" href="paparCalon.css">

<body>
<center>
	<br><h2>Senarai Calon Mengikuti Jawatan</h2>

<?php
// Dapatkan semua jawatan
$jawatanQuery = mysqli_query($con,"SELECT * FROM jawatan ORDER BY KodJawatan");

while($jaw =mysqli_fetch_array($jawatanQuery)){
	$idJawatan = $jaw['KodJawatan'];
	$namaJawatan =$jaw['namaJawatan'];

	echo "<div class='jawatan-title'><h3>Jawatan: $namaJawatan</h3></div>";

	//Dapatkan calon bagi jawatan ini
	$calonQuery = mysqli_query($con,"SELECT * FROM calon WHERE IDJawatan='$idJawatan'");

	echo"<div class='calon-row'>";
	while($calon = mysqli_fetch_array($calonQuery)){
		echo "
		<div class='calon-box'>
		    <img src='".$calon['gambar']."' alt='Calon'><br><br>
		    <b>".$calon['namaCalon']."</b><br>
		    ".$calon['kelas']."<br>
		</div> 
		";
	}
	echo "</div><hr>";
}
?>
</center>
</body>