<?php
require('config.php');
include('menuAdmin2.php'); // FIXED: was menuAdmin.php (file does not exist)

$id    = mysqli_real_escape_string($con, $_GET['IDCALON'] ?? '');
$padam = mysqli_query($con, "DELETE FROM calon WHERE IDCalon = '$id'");

echo "<script>alert('Hapus maklumat Calon berjaya');
             window.location='senaraiCalon.php';</script>";
?>
