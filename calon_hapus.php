<?php
require('config.php');
include('menuAdmin2.php'); 

$id = mysqli_real_escape_string($con, $_GET['IDCALON'] ?? '');

// 1. Find the image filename first
$query = mysqli_query($con, "SELECT gambar FROM calon WHERE IDCalon = '$id'");
if($row = mysqli_fetch_array($query)) {
    $gambar_file = "gambar_calon/" . $row['gambar'];
    
    // 2. Delete the physical file from your computer/server if it exists
    if(file_exists($gambar_file) && !empty($row['gambar'])) {
        unlink($gambar_file); 
    }
}

// 3. Now delete the record from the database
$padam = mysqli_query($con, "DELETE FROM calon WHERE IDCalon = '$id'");

echo "<script>alert('Maklumat dan gambar Calon berjaya dihapus');
             window.location='senaraiCalon.php';</script>";
?>