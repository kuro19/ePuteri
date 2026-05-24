<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<style>
	h3{
			font-family: verdan;
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			color: cream ;
		}

	body{
			backgroud-image: url(putri.jpg);
		}

	input[type="text"] {
			width: 200px;
			padding: 5px;
			margin: 5px;
		}
</style>

<body>
	<h3 class="daftar">DAFTAR PENGUNDI</h3>
	<form class="daftar" action="daftar_pengundi_proses.php" method="post">
		<table>
			<tr>
				<td>No KP</td>
				<td><input type="text" name="NOKP" placeholder="4 digit akhir No KP"
							maxlength="5" width="100" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="NAMA" placeholder="Nama (Huruf besar)" width="100">
				</td>
			    </td>
			</tr>
			<tr>
				<td>Kata Laluan</td>
				<td><input type="password" name="pwd" placeholder="Max:8 huruf" maxlength="8" width="100"></td>
			</tr>
		</table>
		<input type = "hidden" type="text" name="STATUS" value="USER">
		<button class="signup" type="submit">Daftar</button>
		<button class="padam" type="button" onclick="window.location='login.php'">Batal</button>

	</form>
</body>
</html>