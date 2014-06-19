<?php
	require_once ('class/ClassProker.php');
	require_once ('class/strukturClass.php');
    
    $proker = new proker();
    $dataProker = $proker->getProker();
    $dataFoto = $proker->getFoto();
	$struktur = new struktur();
    $dataStruktur = $struktur->getStruktur();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- favicon.ico and apple-touch-icon.png -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon" href="apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/timeline.css">
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300' rel='stylesheet' type='text/css'>

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46457738-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

    </head>
    <body data-spy="scroll" data-target=".navbar">
        
        <section id="home">
            <div class="container">
                <div class="containerblack">
                    <ul class="homenav left">
                        <li><a href="#works" class="scrollto">Galery</a></li>
                        <li><a href="#about" class="scrollto">About</a></li>
                    </ul>
                    <ul class="homenav right">
                        <li><a href="#timeline" class="scrollto">Proker</a></li>
                        <li><a href="#contact" class="scrollto">Struktur</a></li>
                    </ul>
                    <h1><img src="img/hmjie.png"></h1>   
                </div>
                <a href="#works" id="arrow_down">See our work</a>
            </div><!-- end: .containter -->                    	
        </section><!-- end: #home -->

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#"><img src="img/hmjie-logo.png"> <b>Himpunan Mahasiswa Jurusan Ilmu Ekonomi</b></a>
                    <div class="pull-right">
                        <ul class="nav">
                            <li><a href="#home" class="scrollto">Home</a></li>
                            <li><a href="#works" class="scrollto">Galery</a></li>
                            <li><a href="#about" class="scrollto">About</a></li>
                            <li><a href="#timeline" class="scrollto">Proker</a></li>
                            <li><a href="#contact" class="scrollto">Struktur Organisasi</a></li>
                            <li><a href="admin.php">Login</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
       
        <section id="works">
            <div class="container">
                <h2 class="text-center">Galery<i class="icon-works"><img src="img/icon-works.png"></i></h2>
            </div> <!-- end: container -->
            <div id="works_items">
                <ul id="og-grid" class="og-grid">
                    <?php
					if($dataFoto === null)
							{
								echo"<tr>"
									. "<td colspan='7'><div class='alert alert-danger text-center'>Under Construction"
									."</div></td>"
									. "</tr>";
							}
						else 
							{
								$i=1;
                                $j=1;
								foreach ($dataFoto as $data)
									{
                                    $page = $data['nama'];
                                     $dataFoto1 = $proker->getFoto2($page);
					?>
                    <li>
                        <a href="#" data-largesrc="<?php echo $data['foto']; ?>" data-title="<?php echo $data['nama']; ?> " data-description="">
                            <img src="<?php echo $data['foto']; ?>" style="max-width:250px; max-height:250px;" alt="img01"/><div><?php echo $data['nama']; ?></div>
                        </a>
                        <div class="thumbs">
                            <?php
								foreach ($dataFoto1 as $data1)
									{
                                    ?>
                             <a href="#" data-largesrc="<?php echo $data1['foto']; ?>" data-thumb="<?php echo $data1['foto']; ?>" data-title="<?php echo $data1['nama']; ?> " data-description=""></a>
                                 <?php
                                    $j++;
                                    }
                                    ?>
                        </div>
                    </li>
                     <?php
                                    $i++;
                                }
                        }
                        ?>
                </ul>
            </div><!-- end: #works_items -->
        </section><!-- end: #works -->

        <div class="container txtblock">
            <p class="text-center lead">Untuk anggota HMJIE yang ingin update, sharing informasi dan bahan kuliah, Ayo  <a href="admin.php">Login</a> dulu.</p>
        </div> <!-- end: container txtblock -->

        <section id="about">
            <div class="container">
                <div class="span10">
					<h2 class="text-center">About<i class="icon-about"><img src="img/icon-about.png"></i></h2>
					<p class="text-center lead marginer">HIMA Jurusan Ilmu Ekonomi Universitas Andalas adalah himpunan mahasiswa yang berada di bawah naungan jurusan Ilmu Ekonomi Fakultas Ekonomi Universitas Andalas. Merupakan wadah mahasiswa untuk belajar berorganisasi dan bersosialisasi sesama mahasiswa diluar jam akademik.</p>
				</div>
                <p class="text-center lead ">
                <strong>Sejarah</strong>
				</p>
				<p class="text-center lead">sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                <hr />
				<p class="text-center lead ">
                <strong>Latar Belakang</strong>
				</p>
				<p class="text-center lead">sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                <hr />
				<p class="text-center lead ">
                <strong>Visi</strong>
				</p>
				<p class="text-center lead">sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                <hr />
				<p class="text-center lead ">
                <strong>Misi</strong>
				</p>
				<p class="text-center lead">sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                <hr />
				<p class="text-center lead">
				<strong>Lorem ipsum</strong> dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                <div class="clear"></div>
            </div><!-- end: .container -->
        </section>

        <section id="timeline">
            <div class="container">
                <h2 class="text-center">Program &nbsp Kerja  &nbsp HMJIE<i class="icon-time"><img src="img/icon-time.png"></i></h2>
                <p class="text-center lead">Daftar Program Kerja</p> 
                <ul class="cbp_tmtimeline">
				<?php
					if($dataProker === null)
							{
								echo"<tr>"
									. "<td colspan='7'><div class='alert alert-danger text-center'>Under Construction"
									."</div></td>"
									. "</tr>";
							}
						else 
							{
								$i=1;
								foreach ($dataProker as $data)
									{
					?>
                    <li>
                        <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span><?php echo $data['waktu']; ?> - <?php echo $data['waktu1']; ?> </span> <span><h4><?php echo $data['divisi']; ?></h4>	</span></time>
						
                        <div class="cbp_tmicon cbp_tmicon-phone"></div>
                        <div class="cbp_tmlabel">
                            <h2><?php echo $data['nama_proker']; ?></h2>
                            <h4>Tujuan Pelaksanaan</h4>
                            <p><?php echo $data['tujuan']; ?></p>
							<hr/>
							<h4>Sasaran Pelaksanaan</h4>
                            <p><?php echo $data['sasaran']; ?></p>
                        </div>
                    </li>
					<?php
									$i++;
								}
						}
					?>
                </ul>
            </div><!-- end: .containter -->
        </section><!-- end: #timeline -->
        
        <section id="contact">
            <div class="container">
            <h2 class="text-center">Struktur Organisasi HMJIE<i class="icon-contact"></i></h2>
			<?php
			if($dataStruktur === null)
			  {
				  echo"<tr>"
					  . "<td colspan='7'><div class='alert alert-danger text-center'>Under Construction"
					  ."</div></td>"
					  . "</tr>";
			  }
		  else 
			  {
			?>
                <p class="text-center lead"><?php echo $dataStruktur['nama']; ?></p> 
                
                <footer> 
                
                      <img src="<?php echo $dataStruktur['foto']; ?>">
                    </div> 
                </footer><!-- end: .row -->
			<?php
				}
			?>
            </div><!-- end: .container -->
        </section><!-- end: #contact -->
       
        <footer>
            <a href="#home" class="scrollto">
                <img src="img/hmjie-logo.png">
            </a>
        </footer>

        <script src="js/vendor/jquery-1.9.1.min.js"></script>        
			
        <script src="js/vendor/bootstrap.min.js"></script>

		<script src="js/waypoints.min.js" type="text/javascript"></script>
		<script src="js/waypoints-sticky.js" type="text/javascript"></script>
		

        <script src="js/jquery.cycle2.min.js"></script>
        <script src="js/jquery.cycle2.scrollVert.min.js"></script>

		<script src="js/jquery.scrollto.js"></script>
		<script src="js/grid.js"></script>
		<script>
            $('#slider').cycle({
                fx : 'scrollVert',
                timeout: 3000,
                speed: 300,
                slides: '.slide'
            });

			$('.navbar').waypoint('sticky');

			$('a.scrollto, a#arrow_down').click(function(e){
				$('html,body').scrollTo(this.hash, this.hash);
				e.preventDefault();
			});

			$(function() {
				Grid.init();
			});
		</script>
        
        <script src="js/main.js"></script>
    </body>
</html>
