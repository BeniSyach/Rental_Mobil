<?php 
include 'proses.php';
$do = new ClassMobil();
 ?>
<?php 

if (isset($_GET['hapusKota'])) {
	$id = $_GET['hapusKota'];
	$do->deleteKota($id);
}else if (isset($_GET['hapusUser'])) {
	$id = $_GET['hapusUser'];
	$do->deleteCustomer($id);
}else if (isset($_GET['hapusHarga'])) {
	$id = $_GET['hapusHarga'];
	$do->deleteHarga($id);
}else if (isset($_GET['hapusMobil'])) {
	$id = $_GET['hapusMobil'];
	$do->deleteMobil($id);
}else if(isset($_GET['hapusPesanan'])){
	$id = $_GET['hapusPesanan'];
	$do->deletePesanan($id);
}
	
 ?>

