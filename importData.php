<?php
require('config.php');
include('menuAdmin2.php');
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<style>
body{
	        background-image: url(bg_digital.jpg);
	    }
<body>
</style>

<h3 class="import">IMPORT DATA</h3>
<form class="import" action="importData_proses.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama Fail</td>
			<td><input type="file" name="namafail" accept=".txt"></td>
		</tr>
	</table>
	<button class ="import" type="submit">Import</button>
</form>