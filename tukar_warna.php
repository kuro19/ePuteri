<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function tukarWarna(color){
			document.getElementsByTagName('Body')[0].style.backgroundColor = color.value;
		}
	</script>
</head>
<center>
<body>
	<select size="" onchange='tukarWarna(this);'>
		<option value="select">Pilih warna</option>
		<option value="ff99cc">Merah Jambu</option>
		<option value="#ffff99">Kuning</option>
		<option value="#1affa3">Hijau</option>
		<option value="#804000">Coklat</option>
	</select>
</body>
</center>
</html>