<?php
// Fail ini menghubungkan pangkalan data MySQL dengan semua fail PHP

// Set zon masa
date_default_timezone_set("Asia/Kuala_Lumpur");
$tarikh = date('Y-m-d H:i:s');

// Tetapan pangkalan data
$host     = "localhost";
$user     = "root";
$db       = "dbundi";   // ubah nama db mengikut XAMPP anda
$password = "";

// Buat sambungan ke MySQL
$con = mysqli_connect($host, $user, $password, $db);

// Papar mesej jika sambungan gagal
if (!$con) {
    die("Sambungan ke Pangkalan Data Gagal: " . mysqli_connect_error());
}
?>
