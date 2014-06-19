<?php
    require_once ('class/profileClass.php');
    $profil = new profile();
    $dataProfil = $profil->getProfile();
?>
<div class="main-header">
	<h2>Ubah Profile</h2>
	<em>the first priority information</em>
</div>
	<div class="main-content">
	
	<!-- ADVANCED VALIDATION -->
										<div class="widget">
											<div class="widget-header">
												<h3><i class="fa fa-check-circle"></i> Edit Profile</h3>
											</div>
											<div class="widget-content col-sm-5">
												<form id="advanced-form"  method="post" action="view/mainProcess.php?act=editProfil">
                                                    <div class="form-group">
														<label for="text-input2">Nama User</label>
														<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $dataProfil['nama']; ?>" required/>
													</div>
                                                    <div class="form-group">
														<label for="text-input3">Tempat Lahir</label>
														<input type="text" name="tempat" id="tempat" class="form-control" value="<?php echo $dataProfil['tempat_lahir']; ?>" required/>
													</div>
                                                    <div class="form-group">
														<label for="text-input4">Tanggal Lahir</label>
														<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $dataProfil['tanggal_lahir']; ?>" required/>
													</div>
                                                    <div class="form-group">
														<p>Alamat</p>
														<textarea class="form-control"  name="alamat" id="alamat" rows="5" cols="30" required/><?php echo $dataProfil['alamat']; ?></textarea>	
													</div>
                                                    <div class="form-group">
														<label for="text-input5">No.HP</label>
														<input type="number" name="nohp" id="nohp" class="form-control" value="<?php echo $dataProfil['nohp']; ?>" required/>
													</div>
                                                    <div class="form-group">
														<label for="text-input6">Email</label>
														<input type="email" name="email" id="email" class="form-control" value="<?php echo $dataProfil['email']; ?>" required/>
													</div>
                                                    <hr />
                                                    <div class="form-group">
														<button type="submit" class="btn btn-custom-primary">Save Changes</button>
													</div>
                                                    </form>
                                                   
											</div>
										</div>
										<!-- END ADVANCED VALIDATION -->
</div>