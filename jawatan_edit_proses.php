<?php
include('config.php');
include('menuAdmin2.php'); // FIXED: was menuAdmin.php (missing file)

if (isset($_POST['update'])) {
    $IDJawatan   = mysqli_real_escape_string($con, $_POST['IDJAWATAN']);
    $namaJawatan = mysqli_real_escape_string($con, $_POST['NAMAJAWATAN']);

    // FIXED: column 'nama' should be 'namaJawatan'; also used mysql_query (deprecated) instead of mysqli_query
    $update = "UPDATE jawatan SET namaJawatan='$namaJawatan' WHERE IDJawatan='$IDJawatan'";
    $result = mysqli_query($con, $update);

    echo "<script>alert('Kemaskini Jawatan berjaya');
                 window.location='senaraiJawatan.php';</script>";
}
?>
