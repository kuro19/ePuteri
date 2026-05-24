<?php
include('config.php');
include('menuAdmin2.php'); // FIXED: was menuAdmin.php
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="borang.css">
    <link rel="stylesheet" href="button.css">
    <style>
        body { background-image: url(bg-puteri.jpg); background-size: cover; } /* FIXED: beige-bg.jpeg not in archive */
    </style>
</head>
<body>
<h3 class="daftar">BORANG DAFTAR CALON</h3>
<form class="daftar" action="daftarCalon_proses.php" method="post">
<table>
    <tr>
        <td>ID Calon</td>
        <td><input type="text" name="IDCALON" required></td>
    </tr>
    <tr>
        <td>Nama Calon</td>
        <td><input type="text" name="NAMACALON" required></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td><input type="text" name="KELAS" required></td>
    </tr>
    <tr>
        <td>Gambar</td>
        <td><input type="file" name="GAMBAR" accept=".jpeg,.jpg,.png" required></td>
    </tr>
    <tr>
        <td>Jawatan</td>
        <td>
            <select name="IDJAWATAN">
                <!-- FIXED: default option was inside the while loop (repeated every iteration) -->
                <option value="" hidden selected>--Pilih--</option>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM jawatan");
                while ($jawatan = mysqli_fetch_array($sql)) {
                    echo "<option value='" . htmlspecialchars($jawatan['IDJawatan']) . "'>"
                         . htmlspecialchars($jawatan['namaJawatan']) . "</option>";
                }
                ?>
            </select>
        </td>
    </tr>
</table>
<button class="tambah" type="submit" name="submit">TAMBAH</button>
</form>
</body>
</html>
