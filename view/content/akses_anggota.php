<?php
if($_SESSION['akses']!= 'litbang')
	{
		echo "<script>document.location = 'admin.php'</script>";
	}
?>
<?php
    require_once ('class/userClass.php');
	
			$user = new user();
    		$dataUser = $user->getUser();
			
?>
<div class="main-header">
	<h2>User Web HMJIE</h2>
	<em></em>
</div>
	
	<div class="widget widget-table">
		<div class="widget-content">
			<table id="visit-stat-table" class="table  table-striped table-hover datatable" cellpadding="0" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>No.BP/NIP</th>
						<th>Nama User</th>
						<th>Jabatan</th>
						<th>Akses</th>
                        <th colspan="2" width="20%">Edit</th>
					</tr>
				</thead>
				<tbody>
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
									if(isset($_GET['edit']) && $_GET['edit']==$data['id_anggota'])
										{
											echo"<form method='post' action='view/mainProcess.php?act=editAkses&id=".$data['id_anggota']."'><tr>"
											. "<td>".$i."</td>"
											. "<td>".$data['id_anggota']."</td>"
											. "<td>".$data['nama']."</td>"
											. "<td><select name='jabatan'><option value='".$data['jabatan']."'>".$data['jabatan']."</option>"
											. "<option value='pengurus'>Pengurus</option>"
                                            . "<option value='dosen'>Dosen</option>"
                                            . "<option value='anggota'>Anggota</option>"
											. "</select></td>"
											. "<td><select name='akses'><option value='".$data['akses']."'>".$data['akses']."</option>"
											. "<option value='kominfo'>Kominfo</option>"
                                            . "<option value='litbang'>Litbang</option>"
                                            . "<option value='dosen'>Dosen</option>"
											. "<option value='anggota'>Anggota</option>"
											. "</select></td>"
											. "<td><button type='submit' class='btn btn-success'>Simpan</button></td>"
											. "<td><a href='admin.php?p=akses&sub=anggota' class='btn btn-warning'>Batal</a></td>"
											. "</tr></form>";
										}
									else if(isset($_GET['edit']) && $_GET['edit']!=$data['id_anggota'])
										{
											echo"<tr>"
											. "<td>".$i."</td>"
											. "<td>".$data['id_anggota']."</td>"
											. "<td>".$data['nama']."</td>"
											. "<td>".$data['jabatan']."</td>"
											. "<td>".$data['akses']."</td>"
											. "<td><a href='admin.php?p=akses&sub=anggota&edit=".$data['id_anggota']."' class='btn btn-primary'>Edit Data​</a></td>"
											. "</tr>";
										}
									else
										{
											echo"<tr>"
											. "<td>".$i."</td>"
											. "<td>".$data['id_anggota']."</td>"
											. "<td>".$data['nama']."</td>"
											. "<td>".$data['jabatan']."</td>"
											. "<td>".$data['akses']."</td>"
											. "<td><a href='admin.php?p=akses&sub=anggota&edit=".$data['id_anggota']."' class='btn btn-primary'>Edit Data​</a></td>"
											. "</tr>";
										}
									$i++;
								}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>