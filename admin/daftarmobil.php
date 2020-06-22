<?php 
include 'proses.php';
$do = new ClassMobil();
 ?>
<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">

					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">

							<div class="ace-settings-box clearfix" id="ace-settings-box">
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Daftar Mobil
							</h1>
						</div><!-- /.page-header -->

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

													<th>Gambar</th>
												</tr>
											</thead>

											<tbody>
											<?php 
											$no = 1;
											foreach ($do->selectMobilKotaHarga() as $value) {
												//$m = $do->selectOneMobil($value[1]);
												//$n = $do->selectOneKota($value[2]);
												//$o = $do->selectOneMerek('namaMerek');
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
														<img src='../gambar/".$value['gambar']."' width='100px' height='100px'/>
													</td>
													</tr>";
												$no++;
											}
											?>
											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->

								<div class="hr hr-18 dotted hr-double"></div>

								

								<div class="hr hr-18 dotted hr-double"></div>

						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
