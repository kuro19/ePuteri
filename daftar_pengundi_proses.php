<?php
include('config.php');

if (isset($_POST['NOKP'])) {
    $nokp   = trim($_POST["NOKP"]);
    $nama   = trim($_POST["NAMA"]);
    $pwd    = trim($_POST["PWD"]);
    $status = "USER"; // FIXED: status should always default to USER (not taken from POST — security risk)

    // Semakan kosong
    if (empty($nokp)) {
        echo "<script>alert('Sila masukkan 4 digit akhir nombor Kad Pengenalan');
              window.location='daftar_pengundi.php';</script>";
        exit();
    }

    // Semakan nombor sahaja
    if (!preg_match('/^[0-9]+$/', $nokp)) {
        echo "<script>alert('Nombor Kad Pengenalan hanya boleh mengandungi nombor sahaja');
              window.location='daftar_pengundi.php';</script>";
        exit();
    }

    // Semakan panjang
    if (strlen($nokp) < 4) {
        echo "<script>alert('Sila masukkan 4 digit akhir no KP.');
              window.location='daftar_pengundi.php';</script>";
        exit();
    }

    if (empty($nama)) {
        echo "<script>alert('Sila masukkan nama');
              window.location='daftar_pengundi.php';</script>";
        exit(); // FIXED: was missing exit() — execution continued
    }

    if (empty($pwd)) {
        echo "<script>alert('Sila masukkan kata laluan');
              window.location='daftar_pengundi.php';</script>";
        exit(); // FIXED: was missing exit()
    }

    // FIXED: check for duplicate noKP before inserting
    $nokp_safe = mysqli_real_escape_string($con, $nokp);
    $nama_safe = mysqli_real_escape_string($con, $nama);
    $pwd_safe  = mysqli_real_escape_string($con, $pwd);

    $check = mysqli_query($con, "SELECT noKP FROM pengundi WHERE noKP = '$nokp_safe'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('No KP telah didaftarkan. Sila log masuk.');
              window.location='login.php';</script>";
        exit();
    }

    $sql    = "INSERT INTO pengundi(noKP, namaPengundi, pwd, sts) VALUES ('$nokp_safe','$nama_safe','$pwd_safe','$status')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Berjaya daftar');
              window.location='login.php';</script>";
    } else {
        echo "<script>alert('Gagal daftar');
              window.location='utama.php';</script>";
    }
}
?>
