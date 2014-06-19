<?php
	$limit = 10;  
	if (isset($_GET["page"])) 
		{ 
			$page  = $_GET["page"]; 
		} 
	else 
		{ 
			$page=1; 
		};  
    require_once ('class/classInfo.php');
	$start_from = ($page-1) * $limit;
    $info = new info();
    $dataInfo = $info->getInfo($start_from);
?>

<div class="main-header">
	<h2>DASHBOARD</h2>
	<em>the first priority information</em>
</div>
	<div class="main-content">
		<div class="widget widget-table">
											<div class="widget-header">
												<h3><i class="fa fa-desktop"></i>Informasi Terbaru</h3>
												
											</div>
	<div class="widget-content">
											<!-- WIDGET MAIN CHART WITH TABBED CONTENT -->
	
				<!-- ADVANCED VALIDATION -->
					<div class="widget-content">
						<form id="advanced-form" parsley-validate novalidate method="post" action="view/mainProcess.php?act=saveInfo">
							<div class="form-group">
								<p>Posting Informasi</p>
								<textarea class="form-control" rows="3" cols="30" name="info"></textarea>	
							</div>
                            <button type="submit" class="btn btn-custom-primary">Posting</button>
						</form>
					</div>
				<!-- END ADVANCED VALIDATION -->

	<!-- END MODAL DIALOG -->

		
	<div class="widget widget-table">
		
		<div class="widget-content">
				<?php
					$pagination = new pagination();		
					$num = $pagination->totalRecord('informasi', $limit);
					if($page>1)
					{
						$prev = $page - 1;
						$prevpage = "?p=dashboard&page=$prev";
						$classprev = '';
					}
					else {
						$prevpage = '#';
						$classprev = 'disabled';
					}
					if($page<$num){
						$next = $page + 1;
						$nextpage = "?p=dashboard&page=$next";
						$classnext = '';
					}
					else {
						$nextpage = '#';
						$classnext = 'disabled';
					}
					$pagLink = '';
					echo "<ul class='pagination pagination-sm pull-right'>"
						."<li class='".$classprev."'><a href='".$prevpage."'>&laquo;</a></li>";
						  for ($i=1; $i<=$num; $i++) 
						  {  
								$pagLink .= "<li><a href='?p=dashboard&page=".$i."'>".$i."</a></li>";
						  };  
						  echo $pagLink;
					echo "<li class='".$classnext."'><a href='".$nextpage."'>&raquo;</a></li>"
						."</ul>"
						."<div class='clearfix'></div>";
						// echo $pagLink . “</div>”;  
				?>
			<table id="visit-stat-table" class="table  table-striped table-hover datatable" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
				<?php
									if($dataInfo === null)
										{
											echo"<tr>"
											. "<td colspan='7'><div class='alert alert-danger text-center'>Informasi Tidak Ada"
											."</div></td>"
											. "</tr>";
										}
									else 
										{
											$i=($page * 10)-9;
											foreach ($dataInfo as $data)
												{
									?>
										<tr>
										
											<td>									
														<div class="col-md-2">
															<div class="user-info-left">
																	<img src="<?php echo $data['foto'] ?>" alt="Profile Picture" width="120px" height="140px" />
																	<h5><?php echo $data['nama1'] ?><i class="fa fa-user green-font online-icon"></i><sup class="sr-only">online</sup></h5>
															</div>
														</div>
														<div class="col-md-10">
															<div class="user-info-right" id="activity-tab">	
																<i class="fa fa-pencil activity-icon pull-left"></i>
																<p>
																	post info <h5><?php echo $data['informasi'] ?></h5> 
																	<em><h6><span class="timestamp"><?php echo $data['tanggal'] ?></span></h6></em>
																</p>						
															</div>
														</div>	
												 	
												</div>																																   
											</td>
											
										</tr>
								<?php   			
															$i++;
														}
												}
								?>	
											
				</tbody>
				
			</table>
		</div>
	</div>
	</div>
	<!-- END WIDGET TABLE -->