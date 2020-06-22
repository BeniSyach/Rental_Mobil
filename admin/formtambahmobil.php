
<?php 
include 'proses.php';
$do = new ClassSistem();
 ?>
 <style type="text/css">
	#container{
		padding: 10px;
	}
	h2{
		background-color: #eaeaea;
		padding: 10px;
	}
	table tr td{
		margin-right: 10px;
	}
	.submit{
		margin-top: 10px;
		background-color: #eaeaea;
		padding: 5px;
		margin-bottom: 20px;
	}
</style>
<div id="container">
<div id="merek">
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
						</td></tr></br>
<tr><td width="100">Nama Mobil</td><td width="20">:</td><td><input type="text" class="input" size="50" name="namaMobil" /> </td></tr>
<tr><td width="100" valign="top">Tahun</td><td width="20" valign="top">:</td><td><input type="text" class="input" size="50" name="tahun" /></td></tr>
<tr><td width="100">Warna</td><td width="20">:</td><td><input type="text" class="input" size="50" name="warna" /> </td></tr>
<tr><td width="100">Banyak Kursi</td><td width="20">:</td><td><input type="text" class="input" size="50" name="kursi" /> </td></tr>
<tr><td width="100">No plat</td><td width="20">:</td><td><input type="text" class="input" size="50" name="plat" /> </td></tr>
<tr><td width="100">Gambar</td><td width="20">:</td><td><input type="file" class="input" size="50" name="gambar" onchange="PreviewImage();" />  </td></tr>
<tr><td width="100">Harga Jual</td><td width="20">:</td><td><input type="text" class="input" size="50" name="harga" /> </td></tr>
<tr><td width="100"></td><td width="20"></td><td><input type="submit" class="submit" value="Tambah Mobil" name="submit" /> <input type="reset" class="submit" value="Hapus"/></td></tr>
</table>
</form>
</div>
</div>
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
	$harga = $_POST['harga'];
	move_uploaded_file($lokasi_file,"../gambar/$nama_file");
	$do->insertMobil($merek,$namaMobil,$tahun,$warna,$kursi,$plat,$nama_file,$harga);


}

 ?>


			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th class="hidden-480">Nama Mobil</th>
													<th>Merek</th>
													<th>Tahun</th>
													<th>Warna</th>
													<th>Kursi</th>


													<th>
														No Polisi
													</th>
													<th class="hidden-480">Perjalanan</th>

													<th>Pengaturan</th>
												</tr>
											</thead>

											<tbody>
											<?php 
											$no = 1;
											foreach ($do->selectMobilKotaHarga() as $value) {

												echo "<tr>
												<td class='hidden-480'>$value[nama]
														
													</td> 
													<td>
														$value[namaMerek]
													</td>
													<td>
														$value[tahun]
													</td>
													
													<td>$value[warna]</td>
													<td>$value[kursi]</td>
													<td>$value[no_plat]</td>

													<td class='hidden-480'>
													$value[kota_asal] - $value[kota_tujuan]
													</td>

													<td>
														<div class='hidden-sm hidden-xs btn-group'>

															<a href='prosestambahhapus.php?hapusMobil=$value[0]'>
															<button class='btn btn-xs btn-danger'>
																<i class='ace-icon fa fa-trash-o bigger-120'></i>
															</button>
															</a>

														</div>

														<div class='hidden-md hidden-lg'>
															<div class='inline pos-rel'>

																<ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>

																	<li>
																		<a href='#'' class='tooltip-success' data-rel='tooltip' title='Edit'>
																			<span class='green'>
																				<i class='ace-icon fa fa-pencil-square-o bigger-120'></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href='#' class='tooltip-error' data-rel='tooltip' title='Delete'>
																			<span class='red'>
																				<i class='ace-icon fa fa-trash-o bigger-120'></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
													</tr>";
												$no++;
											}
											?>
											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->