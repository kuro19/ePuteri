<?php
include('config.php');

if (isset($_POST['submit'])) {
    $IDCalon   = mysqli_real_escape_string($con, $_POST["IDCALON"]);
    $namacalon = mysqli_real_escape_string($con, $_POST["NAMACALON"]);
    $kelas     = mysqli_real_escape_string($con, $_POST["KELAS"]);
    $gambar    = mysqli_real_escape_string($con, $_POST["GAMBAR"]);
    $IDJawatan = mysqli_real_escape_string($con, $_POST["IDJAWATAN"]);

    $sql    = "INSERT INTO calon(IDCalon,namaCalon,kelas,gambar,IDJawatan)
               VALUES ('$IDCalon','$namacalon','$kelas','$gambar','$IDJawatan')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Maklumat Calon berjaya disimpan');
              window.location='senaraiCalon.php';</script>";
    } else {
        echo "<script>alert('Maklumat Calon gagal disimpan');
              window.location='daftarCalon.php';</script>"; // FIXED: was menuAdmin.php
    }
}
?>
