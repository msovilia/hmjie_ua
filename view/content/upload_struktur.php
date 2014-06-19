<?php
if($_SESSION['akses']!= 'litbang')
	{
		echo "<script>document.location = 'admin.php'</script>";
	}
?>
<div class="main-header">
	<h2>Tambah Struktur Organisasi</h2>
	<em>the first priority information</em>
</div>
	<div class="main-content">
	
	<!-- ADVANCED VALIDATION -->
										<div class="widget">
											<div class="widget-header">
												<h3><i class="fa fa-check-circle"></i>Struktur Organisasi</h3>
											</div>
											<div class="widget-content col-sm-5">
												<form id="advanced-form"  method="post" action="view/mainProcess.php?act=saveStruktur" enctype="multipart/form-data">
													<div class="form-group">
														<label for="text-input1">Nama Struktur</label>
														<input type="text" name="nama" id="nama" class=" form-control" required/>
													</div>
													<div class="form-group">
                                                        	<p>Tambah Foto</p>
															<input type="file" name="file" id="file"/>
														
													</div>
													<hr />
														<div class="form-group">
															<button type="submit" class="btn btn-custom-primary">Save changes</button>
														</div>
                                                    </form>
                                                   
											</div>
										</div>
										<!-- END ADVANCED VALIDATION -->
										
		
</div>