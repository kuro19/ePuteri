<?php
include('config.php');
include('menuAdmin2.php');
?>
<link rel="stylesheet" href="senarai.css">
<link rel="stylesheet" href="button.css">

<?php
// FIXED: query used alias 'u' but FROM clause used full name 'undian' without alias
$sql = "SELECT u.IDJawatan, j.namaJawatan, u.IDCalon, c.namaCalon, COUNT(*) AS jumlah_undi
        FROM undian u
        JOIN calon c   ON u.IDCalon   = c.IDCalon
        JOIN jawatan j ON u.IDJawatan = j.IDJawatan
        GROUP BY u.IDJawatan, u.IDCalon
        ORDER BY u.IDJawatan, jumlah_undi DESC";

$result = mysqli_query($con, $sql);

$currentJawatan = "";
$maxUndi = 0;

echo "<div style='text-align:center;'>";
echo "<h2>Keputusan Undian Mengikut Jawatan</h2>";
echo "<h3>Kelab Puteri Islam 2026</h3>";

while ($row = mysqli_fetch_assoc($result)) {

    if ($currentJawatan !== $row['namaJawatan']) {

        if ($currentJawatan !== "") {
            echo "</table><br>";
        }

        $currentJawatan = $row['namaJawatan'];
        $maxUndi        = $row['jumlah_undi'];

        echo "<h3>" . htmlspecialchars($currentJawatan) . "</h3>";
        echo "<table border='1' cellpadding='8' cellspacing='0' style='margin:auto;'>
                <tr>
                  <th>Calon</th>
                  <th>Jumlah Undi</th>
                </tr>";
    }

    // FIXED: was 'background-colour' (invalid) and style had extra space before '='
    $style = ($row['jumlah_undi'] == $maxUndi)
        ? "style='background-color:#d4edda; font-weight:bold;'"
        : "";

    echo "<tr $style>
            <td>" . htmlspecialchars($row['namaCalon']) . "</td>
            <td>" . $row['jumlah_undi'] . "</td>
          </tr>";
}

if ($currentJawatan !== "") {
    echo "</table>";
}

echo "</div>";
?>
<br>
<center><button onclick="window.print()">CETAK</button></center>
