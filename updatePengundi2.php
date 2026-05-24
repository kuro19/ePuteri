<?php
include('config.php');
include('menuPengundi.php');
?>

<?php
if (isset($_POST['update'])){
	$noKP = $_POST['NOKP'];
	$nama = $_POST['NAMA'];
	$passwd = $_POST['PASSWD'];

//KEMASKINI DATA DALAM JADUAL XAMPP
$update = "UPDATE pengundi SET namaPengundi = '$nama',pwd= '$passwd'
           WHERE noKP = '$noKP'";
$result = mysqli_query($con,$update);

//papar mesej jika rekod berjaya dikemaskini
echo "<script>alert('Kemaskini info pengundi berjaya');
             window.location = 'infoPengundi.php'</script>";
}
?>