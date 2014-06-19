<?php
    require_once ('class/userClass.php');
    $user = new user();
    $dataUser = $user->getUser2();
	$dataUser1 = $user->getUser3();
	$dataUser2 = $user->getUser4();
?>
<div class="main-header">
	<h2>Profil User</h2>
	<em>the first priority information</em>
</div>
	<div class="main-content">
	
	<div class="main-content">
								<!-- NAV TABS -->
								<ul class="nav nav-tabs">
									<li class="active"><a href="#profile-tab" data-toggle="tab"><i class="fa fa-user"></i> Dosen</a></li>
									<li><a href="#activity-tab" data-toggle="tab"><i class="fa fa-group"></i>  Pengurus HMJIE</a></li>
									<li><a href="#settings-tab" data-toggle="tab"><i class="fa fa-group"></i>  Anggota HMJIE</a></li>
								</ul>
								<!-- END NAV TABS -->

								<div class="tab-content profile-page">
									<!-- PROFILE TAB CONTENT -->
              
									<div class="tab-pane profile active" id="profile-tab">
										<div class="row">
                                         <?php
									  if($dataUser === null)
											  {
												  echo"<tr>"
													  . "<td colspan='7'><div class='alert alert-danger text-center'>Data Kosong"
													  ."</div></td>"
													  . "</tr>";
											  }
										  else 
											  {
												  $i=1;
													foreach ($dataUser as $data)
														{
											?>
											<div class="col-md-3">
												<div class="user-info-left">
													<img src="<?php echo $data['foto']; ?>" alt="Profile Picture" width="120px" height="140px" />
													<h2><?php echo $data['nama']; ?><i class="fa fa-user blue-font online-icon"></i><sup class="sr-only">online</sup></h2>
													<div class="contact">
														<a href="admin.php?p=profile&id=<?php echo $data['id_anggota']; ?>" class="btn btn-block btn-custom-secondary"><i class="fa fa-book"></i> Lihat Profil</a>	
													</div>
												</div>
											</div>
                                            <?php
															$i++;
														}
											  }
											?>
											
										</div>
									</div>
									<!-- END PROFILE TAB CONTENT -->

									<!-- ACTIVITY TAB CONTENT -->
									<div class="tab-pane profile" id="activity-tab">
										<div class="row">
                                        <?php
										  if($dataUser2 === null)
												  {
													  echo"<tr>"
														  . "<td colspan='7'><div class='alert alert-danger text-center'>Data Kosong"
														  ."</div></td>"
														  . "</tr>";
												  }
											  else 
												  {
													  $i=1;
														foreach ($dataUser2 as $data2)
															{
												?>
											<div class="col-md-3">
												<div class="user-info-left">
													<img src="<?php echo $data2['foto']; ?>" alt="Profile Picture" width="120px" height="140px" />
													<h2><?php echo $data2['nama'] ?><i class="fa fa-user blue-font online-icon"></i><sup class="sr-only">online</sup></h2>
													<div class="contact">
														<a href="admin.php?p=profile&id=<?php echo $data2['id_anggota']; ?>" class="btn btn-block btn-custom-secondary"><i class="fa fa-book"></i> Lihat Profil</a>	
													</div>
												</div>
											</div>	
                                            <?php
															$i++;
															}
												  }
											?>							
										</div>
									</div>
									<!-- END ACTIVITY TAB CONTENT -->

									<!-- SETTINGS TAB CONTENT -->
									<div class="tab-pane profile" id="settings-tab">
										<div class="row">
                                         <?php
										if($dataUser1 === null)
												{
													echo"<tr>"
														. "<td colspan='7'><div class='alert alert-danger text-center'>Data Kosong"
														."</div></td>"
														. "</tr>";
												}
											else 
												{
													$i=1;
													  foreach ($dataUser1 as $data1)
														  {
											?>
											<div class="col-md-3">
												<div class="user-info-left">
													<img src="<?php echo $data1['foto']; ?>" alt="Profile Picture" width="120px" height="140px" />
													<h2><?php echo $data1['nama']; ?><i class="fa fa-user blue-font online-icon"></i><sup class="sr-only">online</sup></h2>
													<div class="contact">
														<a href="admin.php?p=profile&id=<?php echo $data1['id_anggota']; ?>" class="btn btn-block btn-custom-secondary"><i class="fa fa-book"></i> Lihat Profil</a>	
													</div>
												</div>
											</div>
										<?php
															$i++;
														  }
												}
										?>
										</div>
										</div>
									</div>
									<!-- END SETTINGS TAB CONTENT -->
								</div>

							</div>
</div>