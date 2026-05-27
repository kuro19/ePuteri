<?php
include('config.php');
include('menuAdmin2.php');
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('bg_digital.jpg');
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.95);
            max-width: 1000px;
            margin: 20px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            color: #5a1730;
            font-size: 24px;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden; /* Keeps rounded corners clean */
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #5a1730;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
        }

        tr:hover {
            background-color: #f8dfe4; /* Soft pink hover effect */
            transition: background-color 0.2s ease;
        }

        /* Action Buttons Styling */
        .action-btn {
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            transition: transform 0.1s ease, box-shadow 0.2s ease;
        }

        .btn-edit { background-color: #4CAF50; } /* Green */
        .btn-delete { background-color: #f44336; } /* Red */

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            color: white;
        }
    </style>
</head>
<body>

<div class="table-container">
    <h2>Senarai Pengundi Terdaftar</h2>
    <table>
        <thead>
            <tr>
                <th>Bil</th>
                <th>Nombor KP</th>
                <th>Nama Pengundi</th>
                <th>Kata Laluan</th>
                <th>Status</th>
                <th style="text-align: center;">Tindakan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $hasil = mysqli_query($con,"SELECT * FROM pengundi");

        while($row = mysqli_fetch_array($hasil)) {
            $status = $row['sts'];
            if ($status == "USER"){
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['noKP']; ?></td>
                <td><strong><?php echo $row['namaPengundi']; ?></strong></td>
                <td><?php echo $row['pwd']; ?></td>
                <td><span style="background:#e9bcc6; padding:4px 8px; border-radius:4px; color:#5a1730; font-size:11px; font-weight:bold;"><?php echo $row['sts']; ?></span></td>
                <td style="text-align: center; white-space: nowrap;">
                    <a href="pengundi_edit.php?NOKP=<?php echo $row['noKP']; ?>" class="action-btn btn-edit" onclick="return confirm('Kemaskini data pengundi ini?')">Kemaskini</a>
                    <a href="pengundi_hapus.php?NOKP=<?php echo $row['noKP']; ?>" class="action-btn btn-delete" onclick="return confirm('Adakah anda pasti untuk memadam pengundi ini?')">Padam</a>
                </td>
            </tr>
        <?php
              $no++;
            }
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>