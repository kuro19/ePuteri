<?php
include('config.php');
include('menuAdmin2.php');
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Keputusan Undian</title>
    <link rel="stylesheet" href="senarai.css">
</head>
<!-- FIXED: <style> block had a <body> tag inside it and was never closed properly -->
<style>
body {
    background-image: url(bg_digital.jpg);
    background-size: cover;
}
</style>

<body>
<center>

<h2>Pilih Jawatan</h2>

<form method="GET" action="">
    <div>
        <select name="jawatan">
            <option value="">-- Pilih Jawatan --</option>
            <?php
            $query  = "SELECT * FROM jawatan";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . htmlspecialchars($row['IDJawatan']) . "'>"
                     . htmlspecialchars($row['namaJawatan']) . "</option>";
            }
            ?>
        </select>
        <button type="submit">Papar Keputusan</button>
    </div>
</form>

<hr>

<?php
if (isset($_GET['jawatan']) && $_GET['jawatan'] !== "") {
    $idJawatan = mysqli_real_escape_string($con, $_GET['jawatan']);

    $queryJawatan  = "SELECT namaJawatan FROM jawatan WHERE IDJawatan = '$idJawatan'";
    $resultJawatan = mysqli_query($con, $queryJawatan);
    $dataJawatan   = mysqli_fetch_assoc($resultJawatan);

    echo "<h3>Keputusan Undian - " . htmlspecialchars($dataJawatan['namaJawatan']) . "</h3>";

    $sql = "SELECT calon.namaCalon, COUNT(undian.IDCalon) AS jumlah_undi
            FROM calon
            LEFT JOIN undian ON calon.IDCalon = undian.IDCalon
            WHERE calon.IDJawatan = '$idJawatan'
            GROUP BY calon.IDCalon
            ORDER BY jumlah_undi DESC";

    $result = mysqli_query($con, $sql);

    echo "<table border='1' cellpadding='10'>
            <tr>
              <th>Nama Calon</th>
              <th>Jumlah Undi</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['namaCalon']) . "</td>
                <td>" . $row['jumlah_undi'] . "</td>
              </tr>";
    }

    echo "</table>";
}
?>

<br>
<button onclick="window.print()">CETAK</button>
</center>
</body>
</html>
