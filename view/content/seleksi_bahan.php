<?php
if($_SESSION['akses']!= 'litbang')
	{
		echo "<script>document.location = 'admin.php'</script>";
	}
?>
<?php
    require_once ('class/bahanClass.php');
    $bahan = new bahan();
    $dataBahan = $bahan->getBahan2();
?>
<div class="main-header">
	<h2>Seleksi Bahan Kuliah</h2>
	<em></em>
</div>
	
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
                        <th>Edit</th>
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
									."<td><a href='view/mainProcess.php?act=download&id=".$data['id_file']."' class='btn btn-primary btn-xs'>​Download</a></td>"
                                    . "<td><a href='view/mainProcess.php?act=editBahan&id=".$data['id_file']."' class='btn btn-success btn-xs'>​Posting</a>||<a href='view/mainProcess.php?act=deleteBahan&id=".$data['id_file']."' class='btn btn-warning btn-xs'>​Delete</a></td>"
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