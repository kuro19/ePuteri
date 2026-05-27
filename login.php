<?php
require('config.php');
session_start();

if (isset($_POST['NOKP'])) {
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
            background-image: url('putri.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Verdana, sans-serif;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.95); /* Slightly less transparent for better readability */
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Deeper, softer shadow */
            text-align: center;
            width: 100%;
            max-width: 320px; /* Responsive width */
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #5a1730;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            box-sizing: border-box; /* Ensures padding doesn't push width out */
        }
        
        .button-group {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h3 class="pendek">LOG MASUK</h3>
    <form class="pendek" method="POST">
        
        <div class="form-group">
            <label>No KP:</label>
            <input type="text" name="NOKP" placeholder="4 digit akhir (Cth: 1234)" maxlength="5" required>
        </div>

        <div class="form-group">
            <label>Kata Laluan:</label>
            <input type="password" name="PWD" placeholder="Masukkan kata laluan" maxlength="8" required>
        </div>

        <div class="button-group">
            <button class="login" type="submit">Login</button>
            <button class="signup" type="button" onclick="window.location='daftar_pengundi.php'">Daftar</button>
        </div>

    </form>
</div>
</body>
</html>