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
		<h2>TAMBAH MEREK</h2>
		<form method="post">
		<table>
		<tr>
			<td>Merek &nbsp &nbsp</td>
			<td><input type="text" name="merek"></td>

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
			$merek = $_POST['merek'];
			$do->insertMerek($merek);
		}	
		?>

		<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th class="hidden-480">No</th>
													<th>Merek</th>
													<th>Pengaturan</th>
												</tr>
											</thead>

											<tbody>
											<?php 
											$row = $do->selectMerek();
											$no = 1;
											foreach ($row as $val) {
												echo "<tr>
												<td class='hidden-480'>$no
														
													</td> 
													<td>$val[1]</td>
													<td>
														<div class='hidden-sm hidden-xs btn-group'>
															<a href='prosestambahhapus.php?hapus=$val[0]'>
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