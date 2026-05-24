<?php
require('config');
include('menuAdmin2.php');

//dapatkan noKP yang hendak dipadam dari senaraiPengundi
$id = $_GET['NOKP'];

//Padam maklumat pengundi dalam jadual pelanggan di XAMPP
$padam = mysqli_query($con,"DELETE FROM pengundi WHERE noKP = '$id'");

//papar mesej jika rekod berjaya dipadam
echo "<script>alert('Makulumat pengundi berjaya dipadam');
            window.location = 'senaraiPengundi.php'</script>";
?>