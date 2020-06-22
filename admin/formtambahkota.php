<?php 
include 'proses.php';
$do = new ClassMobil();
 ?>
 <style type="text/css">
	#container{
		padding: 10px;
	}
	h2{
		background-color: #eaeaea;
		padding: 10px;
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
		<h2>TAMBAH JARAK KOTA</h2>
		<form method="post">
		<table>
		<tr>
			<td>Kota asal &nbsp &nbsp</td>
			<td><input type="text" name="kota_asal"> &nbsp &nbsp</td>
			<td>Kota Tujuan &nbsp &nbsp</td>
			<td><input type="text" name="kota_tujuan"></td>

		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" name="save" value="save" class="submit">
			</td>
		</tr>
		</table>
		</form>
		<?php
		if(isset($_POST['save'])){
			$kota_asal = $_POST['kota_asal'];
			$kota_tujuan = $_POST['kota_tujuan'];
			$do->insertKota($kota_asal,$kota_tujuan);
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
													<th class="hidden-480">No</th>
													<th>Kota Asal</th>
													<th>Kota Tujuan</th>
													<th>Pengaturan</th>
												</tr>
											</thead>

											<tbody>
											<?php 
											$row = $do->selectKota();
											$no = 1;
											foreach ($row as $val) {
												echo "<tr>
												<td class='hidden-480'>$no
														
													</td> 
													<td>
														$val[1]
													</td>
													<td>$val[2]</td>
													<td>
														<div class='hidden-sm hidden-xs btn-group'>
															<a href='prosestambahhapus.php?hapusKota=$val[0]'>
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