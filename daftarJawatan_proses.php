<?php
include('config.php');

$kodjawatan  = mysqli_real_escape_string($con, $_POST["IDJAWATAN"]   ?? '');
$namajawatan = mysqli_real_escape_string($con, $_POST["NAMAJAWATAN"] ?? '');

// FIXED: column name was KodJawatan but should match DB schema IDJawatan
$sql    = "INSERT INTO jawatan(IDJawatan, namaJawatan) VALUES ('$kodjawatan','$namajawatan')";
$result = mysqli_query($con, $sql);

if ($result) {
    // FIXED: was redirecting to 'senaraiKategori.php' (wrong/old filename)
    echo "<script>alert('Maklumat Jawatan berjaya disimpan');
          window.location='senaraiJawatan.php';</script>";
} else {
    echo "<script>alert('Maklumat Jawatan gagal disimpan');
          window.location='daftarJawatan.php';</script>"; // FIXED: was menuAdmin.php
}
?>
