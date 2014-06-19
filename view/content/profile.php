<?php
    require_once ('class/profileClass.php');
    $profile = new profile();
	if(!isset($_GET['id']))
		{
			$dataProfil = $profile->getProfile();
			$dataProfil1 = $profile->getProfile2(0);
		}
	else
		{
			$dataProfil = $profile->getProfile();
			$dataProfil1 = $profile->getProfile2($_GET['id']);
		}
?>
<div class="main-header">
	<h2>Profile</h2>
	<em>the first priority information</em>
</div>
<?php
if($dataProfil === null)
	  {
		  echo"<tr>"
			  . "<td colspan='7'><div class='alert alert-danger text-center'>Data Kosong"
			  ."</div></td>"
			  . "</tr>";
	  }
  else 
	  {
		  if($dataProfil1 === null)
		  		{
?>
<div class="main-content">
	<div class="widget-content">
		<div class="row">
			<div class="col-md-3">
				<div class="user-info-left">
					<img src="<?php echo $dataProfil['foto'] ?>" alt="Profile Picture" width="120px" height="140px"  />
					<p style="font-size:16px"><?php echo $dataProfil['nama'] ?></p>
					<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">Ganti Foto</button>
				</div>
			</div>
			
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
												<form id="advanced-form" method="post" action="view/mainProcess.php?act=saveFoto" enctype="multipart/form-data">
													<div class="form-group">
                                                        	<label for="text-input2">Pilih file foto</label>
															<input type="file" name="file" id="file"/>	
													</div>
                                                    <hr />	
                                                    <div class="form-group">
														 <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
														<button type="submit" class="btn btn-custom-primary"><i class="fa fa-check-circle"></i> Save changes</button>
													</div>
                                                    </form>
                                                   
											</div>
										</div>
										<!-- END ADVANCED VALIDATION -->
							</div>
						</div>
					</div>
				</div>
			
			<div class="col-md-9">
				<div class="user-info-right">
					<div class="basic-info">
						<h3><i class="fa fa-square"></i>Informasi Detail</h3>
						<p class="data-row">
							<span class="data-name">Nama Lengkap</span>
							<span class="data-value"><?php echo $dataProfil['nama'] ?></span>
						</p>
						<p class="data-row">
							<span class="data-name">Tempat/Tanggal Lahir</span>
							<span class="data-value"><?php echo $dataProfil['tempat_lahir'] ?>/<?php echo $dataProfil['tanggal_lahir'] ?></span>
						</p>
					</div>
					<div class="contact_info">
						<h3><i class="fa fa-square"></i> Informasi Kontak</h3>
						<p class="data-row">
							<span class="data-name">Email</span>
							<span class="data-value"><?php echo $dataProfil['email'] ?></span>
						</p>
						<p class="data-row">
							<span class="data-name">Nomor HP</span>
							<span class="data-value"><?php echo $dataProfil['nohp'] ?></span>
						</p>
						<p class="data-row">
							<span class="data-name">Alamat</span>
							<span class="data-value"><?php echo $dataProfil['alamat'] ?></span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
				}
			else
				{
?>
<div class="main-content">
	<div class="widget-content">
		<div class="row">
			<div class="col-md-3">
				<div class="user-info-left">
					<img src="<?php echo $dataProfil1['foto'] ?>" alt="Profile Picture" width="120px" height="140px" />
					<p style="font-size:16px"><?php echo $dataProfil1['nama'] ?></p>
				</div>
			</div>
			<div class="col-md-9">
				<div class="user-info-right">
					<div class="basic-info">
						<h3><i class="fa fa-square"></i>Informasi Detail</h3>
						<p class="data-row">
							<span class="data-name">Nama Lengkap</span>
							<span class="data-value"><?php echo $dataProfil1['nama'] ?></span>
						</p>
						<p class="data-row">
							<span class="data-name">Tempat/Tanggal Lahir</span>
							<span class="data-value"><?php echo $dataProfil1['tempat_lahir'] ?>/<?php echo $dataProfil1['tanggal_lahir'] ?></span>
						</p>
					</div>
					<div class="contact_info">
						<h3><i class="fa fa-square"></i> Informasi Kontak</h3>
						<p class="data-row">
							<span class="data-name">Email</span>
							<span class="data-value"><?php echo $dataProfil1['email'] ?></span>
						</p>
						<p class="data-row">
							<span class="data-name">Nomor HP</span>
							<span class="data-value"><?php echo $dataProfil1['nohp'] ?></span>
						</p>
						<p class="data-row">
							<span class="data-name">Alamat</span>
							<span class="data-value"><?php echo $dataProfil1['alamat'] ?></span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
				}
	  }
?>