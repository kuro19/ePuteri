<?php
include('config.php');
include('pengesahan.php');

if (isset($_POST['submit'])) {
    $noKP    = mysqli_real_escape_string($con, $_POST['NOKP']);
    $nosiri  = mysqli_real_escape_string($con, $_POST['NOSIRI']);
    $idcalon = mysqli_real_escape_string($con, $_POST['IDCALON']);
    $jawatan = mysqli_real_escape_string($con, $_POST['IDJAWATAN']); // FIXED: was $jawtan (typo)
    $tarikh  = mysqli_real_escape_string($con, $_POST['TARIKH']);
    $masa    = mysqli_real_escape_string($con, $_POST['MASA']);

    // Semak sama ada pengguna sudah mengundi jawatan ini
    // FIXED: was mysqli_query($con. "...") — dot instead of comma (fatal error)
    $check = mysqli_query($con, "SELECT * FROM undian WHERE noKP='$noKP' AND IDJawatan='$jawatan'");

    if (mysqli_num_rows($check) > 0) {
        echo "<script>
              alert('Anda telah pun mengundi untuk jawatan ini.');
              window.location='pilih_jawatan.php';
              </script>";
    } else {
        $sql1 = "INSERT INTO undian (noKP, IDCalon, IDJawatan, noSiri, tarikh, masa)
                 VALUES ('$noKP','$idcalon','$jawatan','$nosiri','$tarikh','$masa')";

        // FIXED: was mysqli_query($con. $sql1) — dot instead of comma
        if (mysqli_query($con, $sql1)) {
            echo "<script>
                  alert('Undian anda telah disimpan.');
                  window.location='semak_undian.php';
                  </script>";
        } else {
            echo "<script>
                  alert('Undian gagal disimpan: " . mysqli_error($con) . "');
                  window.location='pilih_jawatan.php'; // FIXED: was 'pilih_jawtan.php' (typo)
                  </script>";
        }
    }
}
?>
