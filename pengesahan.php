<?php
// BUG FIX: Only start the session if it hasn't been started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Mulakan sesi login
if(!isset($_SESSION["user"])){
    // Jika belum login, paparkan fail ini
    header("Location: gagal.php");
    exit();
}
?>