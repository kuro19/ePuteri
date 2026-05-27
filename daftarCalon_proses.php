<?php
include('config.php');

if (isset($_POST['submit'])) {
    $IDCalon   = mysqli_real_escape_string($con, $_POST["IDCALON"]);
    $namacalon = mysqli_real_escape_string($con, $_POST["NAMACALON"]);
    $kelas     = mysqli_real_escape_string($con, $_POST["KELAS"]);
    $IDJawatan = mysqli_real_escape_string($con, $_POST["IDJAWATAN"]);

    // BUG FIX: Handle actual file upload using $_FILES instead of $_POST
    $gambar = $_FILES['GAMBAR']['name'];
    $gambar_tmp = $_FILES['GAMBAR']['tmp_name'];
    
    // Tentukan folder di mana gambar akan disimpan (cth: folder 'gambar_calon')
    // Pastikan anda create folder bernama 'gambar_calon' di dalam folder projek anda!
    $folder_simpan = "gambar_calon/" . $gambar; 

    // Pindahkan fail gambar dari lokasi sementara ke folder sasaran
    if(move_uploaded_file($gambar_tmp, $folder_simpan)) {
        
        // Jika gambar berjaya diupload, simpan data ke database
        $sql    = "INSERT INTO calon(IDCalon,namaCalon,kelas,gambar,IDJawatan)
                   VALUES ('$IDCalon','$namacalon','$kelas','$gambar','$IDJawatan')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Maklumat Calon dan Gambar berjaya disimpan');
                  window.location='senaraiCalon.php';</script>";
        } else {
            echo "<script>alert('Maklumat Calon gagal disimpan ke pangkalan data');
                  window.location='daftarCalon.php';</script>"; 
        }
        
    } else {
        echo "<script>alert('Ralat: Gagal memuat naik gambar. Pastikan folder gambar_calon wujud.');
              window.location='daftarCalon.php';</script>";
    }
}
?>