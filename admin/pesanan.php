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
								Daftar Pemesan
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
													<th>No</th>
													<th>Nama Mobil</th>
													<th>Warna</th>
													<th>Tahun</th>
													<th>Banyak Kursi</th>
													<th>No polisi</th>
													<th>Tanggal Pinjam</th>
													<th>Tanggal Kembali</th>
													<th>Harga</th>
													<th>Aksi</th>
												</tr>
											</thead>

											<tbody>
											<?php 
											$no = 1;
											foreach ($do->semuainfotagihan() as $value) {
												echo "<tr>
												<td>$no</td>
												<td class='hidden-480'>$value[nama]
														
													</td> 
													<td>
														$value[warna]
													</td>
													<td>
														$value[tahun]
													</td>
													<td>$value[kursi]</td>
													<td>$value[no_plat]</td>
													<td>$value[tgl_pinjam]</td>
													<td>$value[tgl_kembali]</td>
													<td>$value[harga]</td>
														<td>
														<div class='hidden-sm hidden-xs btn-group'>
															<a href='prosestambahhapus.php?hapusPesanan=$value[0]'>
															<button class='btn btn-xs btn-danger' name='hapus'>
																<i class='ace-icon fa fa-trash-o bigger-120'></i>
															</button>
															</a>
														</div>

														<div class='hidden-md hidden-lg'>
															<div class='inline pos-rel'>

																<ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>

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

								<div class="hr hr-18 dotted hr-double"></div>

								

								<div class="hr hr-18 dotted hr-double"></div>

						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
