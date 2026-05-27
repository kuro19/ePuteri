<?php
// Check if file exists before trying to open it!
if (!file_exists("data.txt")) {
    echo "<script>alert('RALAT: Fail data.txt tidak dijumpai!'); window.location='menuAdmin2.php';</script>";
    exit();
}

$fail  = fopen("data.txt", "r");
$berjaya = 0; // Keep track of successful imports

while (!feof($fail)) {
    $line  = fgets($fail);
    if (empty(trim($line))) continue; // Skip completely blank lines
    
    $medan = explode(',', trim($line));
    if (count($medan) < 4) continue; // skip incomplete lines

    $noKP         = mysqli_real_escape_string($con, trim($medan[0]));
    $namaPengundi = mysqli_real_escape_string($con, trim($medan[1]));
    $pwd          = mysqli_real_escape_string($con, trim($medan[2]));
    $status       = mysqli_real_escape_string($con, trim($medan[3]));

    // INSERT IGNORE prevents XAMPP errors if the NoKP already exists in the database
    $sql   = "INSERT IGNORE INTO pengundi(noKP,namaPengundi,pwd,sts) VALUES('$noKP','$namaPengundi','$pwd','$status')";
    
    if(mysqli_query($con, $sql) && mysqli_affected_rows($con) > 0) {
        $berjaya++;
        ?>
        <tr>
            <td><?php echo htmlspecialchars($noKP); ?></td>
            <td><?php echo htmlspecialchars($namaPengundi); ?></td>
            <td><?php echo htmlspecialchars($pwd); ?></td>
            <td><?php echo htmlspecialchars($status); ?></td>
        </tr>
        <?php
    }
}
fclose($fail);

echo "<script>alert('Selesai: $berjaya rekod baharu berjaya diimport.');</script>";
?>