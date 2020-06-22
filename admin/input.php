<?php 
include 'proses.php';
$do = new ClassMobil();
 ?>

 <div id="container">
		<div id="merek">
		<h2>TAMBAH MEREK</h2>
		<form method="post">
			 <input type="text" name="merek">
			 <input type="submit" name="save" value="save">
		</form>
		<?php
		if(isset($_POST['save'])){
			$merek = $_POST['merek'];
			$do->insertMerek($merek);
		}	
		?>
		<table>
			<tr>
				<td>No</td><td>Merek</td>
			</tr>
			<?php
			$row = $do->selectMerek();
			$no = 1;
			foreach ($row as $val) {
				echo "<tr><td>$no</td><td>".$val['merek']."</td>";
				$no++;
			}
			?>
		</table>
		</div>
		
<form method="post" enctype="multipart/form-data">
<h2>TAMBAH MOBIL</h2>
<table>
<tr><td width="100">Merek</td>
<td width="20">:</td>
						<td>
							<select name="merek">
								<?php
								foreach ($do->selectMerek() as $val) {
									echo "<option value='$val[0]'>$val[1]</option>";
								}
								?>
							</select>
						</td></tr>
<tr><td width="100">Nama Mobil</td><td width="20">:</td><td><input type="text" class="input" size="50" name="namaMobil" /> </td></tr>
<tr><td width="100" valign="top">Tahun</td><td width="20" valign="top">:</td><td><input type="text" class="input" size="50" name="tahun" /></td></tr>
<tr><td width="100">Warna</td><td width="20">:</td><td><input type="text" class="input" size="50" name="warna" /> </td></tr>
<tr><td width="100">Banyak Kursi</td><td width="20">:</td><td><input type="text" class="input" size="50" name="kursi" /> </td></tr>
<tr><td width="100">No plat</td><td width="20">:</td><td><input type="text" class="input" size="50" name="plat" /> </td></tr>
<tr><td width="100">Gambar</td><td width="20">:</td><td><input type="file" class="input" size="50" name="gambar" onchange="PreviewImage();" />  </td></tr>
<tr><td width="100"></td><td width="20"></td><td><input type="submit" class="submitButton" value="Tambah Mobil" name="submit" /> <input type="reset" class="submitButton" value="Hapus"/></td></tr>
</table>
</form>

<?php 
if (isset($_POST['submit'])) {
	$merek = $_POST['merek'];
	$namaMobil = $_POST['namaMobil'];
	$tahun = $_POST['tahun'];
	$warna = $_POST['warna'];
	$kursi = $_POST['kursi'];
	$plat = $_POST['plat'];
	$lokasi_file=$_FILES['gambar']['tmp_name'];
	$nama_file=$_FILES['gambar']['name'];
	move_uploaded_file($lokasi_file,"../gambar/$nama_file");
	$do->insertMobil($merek,$namaMobil,$tahun,$warna,$kursi,$plat,$nama_file);


}

 ?>

			<table>
				<tr>
					<td>No</td><td>Merek</td><td>Nama</td><td>Tahun</td><td>Warna</td><td>Banyak Kursi</td><td>No Plat</td><td>Gambar</td>
				</tr>
				<tr>
					<?php
					$no = 1;
					foreach ($do->selectMobil() as $value) {
						$m = $do->selectOneMerek($value[1]);
						echo "<tr>
							<td>$no</td>
							<td>$m[merek]</td>
							<td>$value[2]</td>
							<td>$value[3]</td>
							<td>$value[4]</td>
							<td>$value[5]</td>
							<td>$value[6]</td>
							<td><img src='../gambar/".$value[7]."' width='100px' height='100px'/></td>
						</tr>";
						$no++;
					}
					?>
				</tr>
			</table>

<div id="container">
		<div id="kota">
		<form method="post">
		<h2>TAMBAH KOTA</h2>
			 <table>
			 	<tr>
			 		<td>Kota Asal</td>
			 		<td><input type="text" name="kotaAsal"></td>
			 	</tr>
			 	<tr>
			 		<td>Kota Tujuan</td>
			 		<td><input type="text" name="kotaTujuan"></td>
			 	</tr>
			 	<tr>
			 		<td></td>
			 		<td><input type="submit" name="submitkota" value="Tambah Kota"></td>
			 	</tr>
			 </table>
		</form>
		<?php
		if(isset($_POST['submitkota'])){
			$asal = $_POST['kotaAsal'];
			$tujuan = $_POST['kotaTujuan'];
			$do->insertKota($asal,$tujuan);
		}	
		?>
		<table>
			<tr>
				<td>No</td><td>Kota Asal</td><td>Kota Tujuan</td>
			</tr>
			<?php
			$row = $do->selectKota();
			$no = 1;
			foreach ($row as $val) {
				echo "<tr><td>$no</td><td>".$val['kota_asal']."</td><td>".$val['kota_tujuan']."</td>";
				$no++;
			}
			?>
		</table>
		</div>

		<div id="container">
		<div id="mobil">
		<form method="post">
		<h2>HARGA MOBIL</h2>
			 <table>
			 	<tr><td width="100">Mobil</td>
				<td width="20">:</td>
						<td>
							<select name="mobil">
								<?php
								foreach ($do->selectMobil() as $val) {
									echo "<option value='$val[0]'>$val[2]</option>";
								}
								?>
							</select>
						</td></tr>
				<tr><td width="100">Kota</td>
				<td width="20">:</td>
						<td>
							<select name="kota">
								<?php
								foreach ($do->selectKota() as $val) {
									echo "<option value='$val[0]'>$val[1]-$val[2]</option>";
								}
								?>
							</select>
						</td></tr>
				<tr><td width="100">Harga</td><td width="20">:</td><td><input type="text" class="input" size="50" name="harga" /> </td></tr>
				<tr><td width="100"></td><td width="20"></td><td><input type="submit" class="submitButton" value="Tambah Harga" name="tambahHarga" /> <input type="reset" class="submitButton" value="reset"/></td></tr>
			 </table>
		</form>
		<?php
		if(isset($_POST['tambahHarga'])){
			$mobil = $_POST['mobil'];
			$kota = $_POST['kota'];
			$harga = $_POST['harga'];
			$do->insertHarga($mobil,$kota,$harga);
		}	
		?>
		<table>
			<tr>
				<td>No</td><td>Mobil</td><td>Kota</td><td>Harga</td>
			</tr>
			<?php
					$no = 1;
					foreach ($do->selectHarga() as $value) {
						$m = $do->selectOneMobil($value[1]);
						$n = $do->selectOneKota($value[2]);
						echo "<tr>
							<td>$no</td>
							<td>$m[nama]</td>
							<td>$n[kota_asal]-$n[2]</td>
							<td>$value[3]</td>
						</tr>";
						$no++;
					}
					?>
		</table>
		</div>