<?php
    require_once ('class/bahanClass.php');
    $bahan = new bahan();
    $dataBahan = $bahan->getBahan();
?>
<div class="main-header">
	<h2>Bahan Kuliah</h2>
	<em></em>
</div>


	<div class="widget widget-table">
		<div class="widget-content">
				
				<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">Upload Bahan Kuliah</button>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<!-- ADVANCED VALIDATION -->
										<div class="widget">
											<div class="widget-header">
												<h3><i class="fa fa-check-circle"></i> Upload</h3>
											</div>
											<div class="widget-content">
												<form id="advanced-form" method="post" action="view/mainProcess.php?act=saveBahan" enctype="multipart/form-data">
													<div class="form-group">
														<label for="text-input2">Mata Kuliah</label>
														<input type="text" name="matkul" id="matkul" class="form-control" required="required"/>
													</div>
													<div class="form-group">
														<label for="text-input3">Tipe Bahan</label>
														<select name="tipe">
                                                        <option value="bahan">Bahan Kuliah</option>
                                                        <option value="tugas">Tugas Kuliah</option>
                                                        <option value="skripsi">Skripsi/TA</option>
                                                        </select>
													</div>
													<div class="form-group">
														<p>Keterangan</p>
														<textarea class="form-control"  name="ket" id="ket" rows="5" cols="30" required="required"/></textarea>	
													</div>
													<div class="form-group">
                                                        	<p>Tambah File</p>
															<input type="file" name="file" id="file"/>
														
													</div>
                                                    <hr />	
                                                    <div class="form-group">
														 <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
														<button type="submit" class="btn btn-custom-primary"><i class="fa fa-check-circle"></i>Upload</button>
													</div>
                                                    </form>
                                                   
											</div>
										</div>
										<!-- END ADVANCED VALIDATION -->
							</div>
						</div>
					</div>
				</div>
		</div>	
	</div>
	<!-- END MODAL DIALOG -->	
	
	<div class="widget widget-table">
		<div class="widget-content">
			<table id="visit-stat-table" class="table  table-striped table-hover datatable" cellpadding="0" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama File</th>
						<th>Mata Kuliah</th>
						<th>Keterangan</th>
						<th>Pengupload</th>
                        <th>Ukuran</th>
                        <th>Download</th>
					</tr>
				</thead>
				<tbody>
                <?php
				if($dataBahan === null)
						{
							echo"<tr>"
								. "<td colspan='7'><div class='alert alert-danger text-center'>Data Kosong"
								."</div></td>"
								. "</tr>";
						}
					else 
						{
							$i=1;
							foreach ($dataBahan as $data)
								{
									echo"<tr>"
									. "<td>".$i."</td>"
                                    . "<td>".$data['nama']."</td>"
                                    . "<td>".$data['jenis_matkul']."</td>"
                                    . "<td>".$data['keterangan']."</td>"
									. "<td>".$data['nama1']."</td>"
                                    . "<td>".$data['size']."</td>"
                                    . "<td><a href='view/mainProcess.php?act=download&id=".$data['id_file']."' class='btn btn-primary btn-xs'>​Download</a></td>"
                                    . "</tr>";
									$i++;
								}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- END WIDGET TABLE -->