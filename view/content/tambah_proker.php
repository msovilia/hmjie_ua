<?php
if($_SESSION['akses']!= 'kominfo')
	{
		echo "<script>document.location = 'admin.php'</script>";
	}
?>
<div class="main-header">
	<h2>Program Kerja HMJIE</h2>
	<em>the first priority information</em>
</div>
	<div class="main-content">
	
	<!-- ADVANCED VALIDATION -->
										<div class="widget">
											<div class="widget-header">
												<h3><i class="fa fa-check-circle"></i>Proker</h3>
											</div>
											<div class="widget-content col-sm-5">
												<form id="advanced-form"  method="post" action="view/mainProcess.php?act=saveProker">
													<div class="form-group">
														<label for="text-input1">Nama Proker</label>
														<input type="text" name="nama" id="nama" class=" form-control" required/>
													</div>
                                                   <div class="form-group">
														<label for="text-input7">Divisi</label>
														<select name="divisi" style="width:300px" class="form-control">
                                                        <option value="HUMAS">HUMAS</option>
                                                        <option value="KOMINFO">KOMINFO</option>
                                                        <option value="LITBANG">LITBANG</option>
														<option value="KEMAHASISWAAN">KEMAHASISWAAN</option>
                                                        </select>
													</div>
                                                    <div class="form-group">
														<p>Tujuan</p>
														<textarea class="form-control"  name="tujuan" id="tujuan" rows="5" cols="30"></textarea>	
													</div>
                                                    <div class="form-group">
														<label for="text-input6">Sasaran</label>
														<input type="text" name="sasaran" id="sasaran" class="form-control" required/>
													</div>
													<div class="form-group">
														<p>Tanggal pelaksanaan</p>
														<hr />
														<p>Start</p>
														<input type="date" name="tanggal" id="tanggal" class="form-control" required/>
														<hr />
														<p>End</p>
														<input type="date" name="tanggal2" id="tanggal2" class="form-control" required/>
													</div>
                                                    <div class="form-group">
														<p>Sumber Dana</p>
														<input type="text" name="sumber" id="sumber" class="form-control" required/>
													</div>
                                                    <hr />
                                                    <div class="form-group">
														<button type="submit" class="btn btn-custom-primary">Simpan Proker</button>
													</div>
                                                    </form>
                                                   
											</div>
										</div>
										<!-- END ADVANCED VALIDATION -->
										
		
</div>