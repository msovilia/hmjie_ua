
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Dashboard | Kingboard - Admin Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="description" content="Kingboard - Bootstrap Admin Dashboard Theme">
	<meta name="author" content="The Develovers">

	<!-- CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/main.min.css" rel="stylesheet" type="text/css">

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/kingboard-favicon144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/kingboard-favicon114x114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/kingboard-favicon72x72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/ico/kingboard-favicon57x57.png">
	<link rel="shortcut icon" href="assets/ico/favicon.png">

</head>

<body class="dashboard">
	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- TOP GENERAL ALERT 
		
		<div class="alert alert-info top-general-alert">
			<span>The system has been upgraded to the new version. Click the <a href="#">release notes</a> to see the changes.</span>
			<a type="button" class="close">&times;</a>
		</div>
		
	    END TOP GENERAL ALERT -->

		<div class="top-bar">
			<div class="container">
				<div class="row">
					<!-- logo -->
					<div class="col-md-2">
                                            <button type="button" class="btn btn-default"></i> Himpunan Mahasiswa Jurusan Ilmu Ekonomi</button>
					</div>
					<!-- end logo -->
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-12">
								<div class="top-bar-right">
									<!-- responsive menu bar icon -->
									<a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i></a>
									<!-- end responsive menu bar icon -->
									
									<!-- logged user and the menu -->
									<div class="logged-user">
										<div class="btn-group">
											<a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
												
												<span class="name"> <i class="fa fa-user"></i><?php echo $_SESSION['name']; ?></span>
												<span class="caret"></span>
											</a>
											<ul class="dropdown-menu" role="menu">
												<li>
													<a href="?p=profile">
														<i class="fa fa-user"></i>
														<span class="text">My Profile</span>
													</a>
												</li>
												<li>
													<a href="?p=edit&sub=profile">
														<i class="fa fa-cog"></i>
														<span class="text">Ubah Profile</span>
													</a>
												</li>
												<li>
													<a href="?p=setting">
														<i class="fa fa-cog"></i>
														<span class="text">Ubah Password</span>
													</a>
												</li>
												<li>
													<a href="view/mainProcess.php?act=logout">
														<i class="fa fa-power-off"></i>
														<span class="text">Logout</span>
														
													</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- end logged user and the menu -->
								</div>
								<!-- /top-bar-right -->
							</div>
						</div>
						<!-- /row -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top -->


		<!-- BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
		<div class="bottom">
			<div class="container">
				<div class="row">
					<!-- left sidebar -->
					<div class="col-md-2 left-sidebar">

						<!-- main-nav -->
						<nav class="main-nav">

							<ul class="main-menu">
								<li><a href="admin.php"><i class="fa fa-dashboard fa-fw"></i><span class="text">Dashboard</span></a></li>
								<li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-clipboard fa-fw"></i><span class="text">Bahan Kuliah</span>
									<i class="toggle-icon fa fa-angle-left"></i></a>
									<ul class="sub-menu ">
										<li>
											<a href="?p=bahan&sub=kuliah">
												<span class="text">Daftar Bahan Kuliah</span>
											</a>
										</li>
								<?php
									if($_SESSION['akses']=='litbang')
										{
								?>
										<li>
											<a href="?p=seleksi&sub=bahan">
												<span class="text">Seleksi Bahan Kuliah</span>
											</a>
										</li>
								<?php
										}
								?>
									</ul>
								</li>
								<?php
									if(($_SESSION['akses']=='kominfo') || ($_SESSION['akses']=='litbang'))
										{
								?>
								<li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-clipboard fa-fw"></i><span class="text">Program Kerja</span>
                                  <i class="toggle-icon fa fa-angle-left"></i></a>
                                      <ul class="sub-menu ">
                                  
                                <?php
									if($_SESSION['akses']=='kominfo')
										{
								?>                                      
                                          <li>
                                              <a href="?p=tambah&sub=proker">
                                                  <span class="text">Input Program Kerja</span>
                                              </a>
                                          </li>	  
                                <?php
										}
								?>	   
                                <?php
									if($_SESSION['akses']=='litbang')
										{
								?>                                  
                                          <li>
                                              <a href="?p=galery">
                                                  <span class="text">Input Galery</span>
                                              </a>
                                          </li>	
                                	<?php
										}
								?>	                                          
                                      </ul>
                                </li>
								<?php
										}
								?>	
								<li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-group fa-fw"></i><span class="text">User</span>
									<i class="toggle-icon fa fa-angle-left"></i></a>
									<ul class="sub-menu ">
								<?php
									if($_SESSION['akses']=='litbang')
										{
								?>
										<li>
											<a href="?p=user&sub=anggota">
												<span class="text">Daftar User</span>
											</a>
										</li>
                                        <li>
											<a href="?p=akses&sub=anggota">
												<span class="text">Hak Akses & Jabatan</span>
											</a>
										</li>
								<?php
										}
								?>		
                                        <li>
											<a href="?p=anggota">
												<span class="text">Profile User</span>
											</a>
										</li>		
									</ul>
								</li>
								<?php
									if($_SESSION['akses']=='litbang')
										{
								?>
								<li><a href="?p=upload&sub=struktur"><i class="fa fa-book fa-fw"></i><span class="text">Struktur Organisasi</span></a></li>
								<?php
										}
								?>	
							</ul>
                                                    
						</nav>
						<!-- /main-nav -->
                         
						<div class="sidebar-minified js-toggle-minified">
							<i class="fa fa-angle-left"></i>
						</div>
					</div>
					<!-- end left sidebar -->

					<!-- content-wrapper -->
					<div class="col-md-10 content-wrapper">
						<!-- main -->
						<div class="content">
                        <?php
							$webApp = new webApp();
							$webApp->loadContent();
						?>

							<!-- /main-content -->
						</div>
						<!-- /main -->
					</div>
					<!-- /content-wrapper -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- END BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->

		<!-- FOOTER -->
		<footer class="footer">
			&copy; 2014 The Develovers
		</footer>
		<!-- END FOOTER -->

	</div>
	<!-- /wrapper -->

	<!-- Javascript -->
	<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-tour.custom.js"></script>
	<script type="text/javascript" src="assets/js/king-common.min.js"></script>
	<script type="text/javascript" src="demo-style-switcher/assets/js/deliswitch.min.js"></script>
	<script type="text/javascript" src="assets/js/stat/jquery.easypiechart.min.js"></script>
	<script type="text/javascript" src="assets/js/raphael-2.1.0.min.js"></script>
	<script type="text/javascript" src="assets/js/stat/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="assets/js/stat/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="assets/js/stat/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="assets/js/stat/flot/jquery.flot.pie.min.js"></script>
	<script type="text/javascript" src="assets/js/stat/flot/jquery.flot.tooltip.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="assets/js/datatable/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/datatable/jquery.dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mapael.js"></script>
	<script type="text/javascript" src="assets/js/maps/usa_states.js"></script>
	<script type="text/javascript" src="assets/js/king-chart-stat.min.js"></script>
	<script type="text/javascript" src="assets/js/king-table.min.js"></script>
	<script type="text/javascript" src="assets/js/king-components.min.js"></script>

</body>

</html>