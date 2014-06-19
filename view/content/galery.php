<?php
if($_SESSION['akses']!= 'litbang')
	{
		echo "<script>document.location = 'admin.php'</script>";
	}
?>
<?php
require_once ('class/ClassProker.php');
$proker = new proker();
$dataProker = $proker->getProker2();
$dataFoto = $proker->getFoto3();
?>
<div class="main-header">
	<h2>Tambah Galery Proker</h2>
</div>
	<div class="widget widget-table">
		<div class="widget-content">
	
	<!-- ADVANCED VALIDATION -->
										<div class="widget">
											<div class="widget-header">
												<h3><i class="fa fa-check-circle"></i>Galery Proker</h3>
											</div>
											<div class="widget-content col-sm-5">
												<form id="advanced-form"  method="post" action="view/mainProcess.php?act=saveGalery" enctype="multipart/form-data">
													<div class="form-group">
														<label for="text-input1">Nama Proker</label>
                                                        <select name="galery">
                                                        <?php
                                                        if($dataProker === null)
                                                            {
                                                        ?>
                                                                <option value=""></option>
                                                        <?php
                                                            }
                                                        else 
                                                            {
                                                                $i=1;
							                                     foreach ($dataProker as $data)
                                                                 {
                                                                        echo "<option value='".$data['nama_proker']."'>".$data['nama_proker']."</option>";
                                                                            $i++;
                                                                 }   
                                                            }
                                                        ?>
                                                        </select>
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
</div>
<div class="widget widget-table">
		<div class="widget-content">
			<table id="visit-stat-table" class="table  table-striped table-hover datatable" cellpadding="0" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Proker</th>
						<th>Nama Foto</th>
                        <th>Download</th>
                        <th>Edit</th>
					</tr>
				</thead>
				<tbody>
                <?php
				if($dataFoto === null)
						{
							echo"<tr>"
								. "<td colspan='7'><div class='alert alert-danger text-center'>Data Kosong"
								."</div></td>"
								. "</tr>";
						}
					else 
						{
							$i=1;
							foreach ($dataFoto as $data1)
								{
									echo"<tr>"
									. "<td>".$i."</td>"
                                    . "<td>".$data1['nama']."</td>"
                                    . "<td>".$data1['foto']."</td>"
									."<td><a href='view/mainProcess.php?act=downloadFoto&id=".$data1['id']."' class='btn btn-primary btn-xs'>​Download</a></td>"
                                    . "<td><a href='view/mainProcess.php?act=deleteFoto&id=".$data1['id']."' class='btn btn-warning btn-xs'>​Delete</a></td>"
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