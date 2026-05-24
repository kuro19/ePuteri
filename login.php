<?php
require('config.php');
session_start();

if (isset($_POST['NOKP'])) {
    // Sanitize inputs - FIXED: was directly interpolated into SQL (SQL injection)
    $nokp = mysqli_real_escape_string($con, trim($_POST['NOKP']));
    $pwd  = mysqli_real_escape_string($con, trim($_POST['PWD']));

    $sql   = "SELECT * FROM pengundi WHERE noKP = '$nokp' AND pwd = '$pwd'";
    $rekod = mysqli_query($con, $sql);

    if ($hasil = mysqli_fetch_array($rekod)) {
        $_SESSION['user'] = $hasil['noKP'];
        $_SESSION['name'] = $hasil['namaPengundi'];
        $status = $hasil['sts'];

        if ($status === 'ADMIN') {
            echo "<script>alert('LOG MASUK SEBAGAI PENTADBIR BERJAYA');
                  window.location='menuAdmin2.php';</script>";
        } else {
            echo "<script>alert('LOG MASUK BERJAYA');
                  window.location='menuPengundi.php';</script>";
        }
    } else {
        // FIXED: original code had a broken logic - compared $id/$pass variables
        // that were only set inside the while loop, so if no user found they were undefined
        echo "<script>alert('LOG MASUK GAGAL. No KP atau kata laluan salah.');
              window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk - ePuteri</title>
    <link rel="stylesheet" href="borang.css">
    <link rel="stylesheet" href="button.css">
    <style>
        body {
            background-image: url(putri.jpg);
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        } /* FIXED: original was missing closing brace for body { */

        .login-box {
            background: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* FIXED: was rgba(0,0,0,0,3) - 4 values invalid */
            text-align: center;
        }

        table {
            margin: auto;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h3 class="pendek">LOG MASUK</h3>
    <form class="pendek" method="POST">
        <table border="0">
            <tr>
                <td>No KP:</td>
                <td><input type="text" name="NOKP" placeholder="4 digit akhir no KP"
                           maxlength="5" style="width:170px"></td>
            </tr>
            <tr>
                <td>Kata Laluan:</td>
                <td><input type="password" name="PWD" placeholder="Maksimum 8 aksara"
                           maxlength="8" style="width:170px"></td>
            </tr>
        </table>
        <button class="login" type="submit">Login</button>
        <button class="signup" type="button" onclick="window.location='daftar_pengundi.php'">Daftar</button>
    </form>
</div>
</body>
</html>
