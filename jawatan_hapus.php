<?php
require('config.php');
include('menuAdmin2.php');

// FIXED: senaraiJawatan.php was sending IDJAWTAN (typo), now fixed there
// This file correctly reads IDJAWATAN
$id   = mysqli_real_escape_string($con, $_GET['IDJAWATAN'] ?? '');
$padam = mysqli_query($con, "DELETE FROM jawatan WHERE IDJawatan = '$id'");

echo "<script>alert('Hapus Jawatan berjaya');
             window.location='senaraiJawatan.php';</script>";
?>
