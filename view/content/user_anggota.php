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
				
				<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">Tambah User</button>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<!-- ADVANCED VALIDATION -->
										<div class="widget">
											<div class="widget-header">
												<h3><i class="fa fa-check-circle"></i> Tambah User</h3>
											</div>
											<div class="widget-content">
												<form id="advanced-form" method="post" action="view/mainProcess.php?act=saveUser" enctype="multipart/form-data">
													<div class="form-group">
														<label for="text-input1">No.BP/NIP</label>
														<input type="number" name="id" id="id" class="col-sm-5 form-control" required/>
													</div>
                                                    <div class="form-group">
														<label for="text-input2">Nama User</label>
														<input type="text" name="nama" id="nama" class="form-control" required/>
													</div>
                                                    <div class="form-group">
														<label for="text-input3">Tempat Lahir</label>
														<input type="text" name="tempat" id="tempat" class="form-control" required/>
													</div>
                                                    <div class="form-group">
														<label for="text-input4">Tanggal Lahir</label>
														<input type="date" name="tanggal" id="tanggal" class="form-control" required/>
													</div>
                                                    <div class="form-group">
														<p>Alamat</p>
														<textarea class="form-control"  name="alamat" id="alamat" rows="5" cols="30"></textarea>	
													</div>
                                                    <div class="form-group">
														<label for="text-input5">No.HP</label>
														<input type="number" name="nohp" id="nohp" class="form-control" required/>
													</div>
                                                    <div class="form-group">
														<label for="text-input6">Email</label>
														<input type="email" name="email" id="email" class="form-control" required/>
													</div>
													<div class="form-group">
														<label for="text-input7">Jabatan</label>
														<select name="jabatan" style="width:300px" class="form-control">
                                                        <option value="pengurus">Pengurus</option>
                                                        <option value="dosen">Dosen</option>
                                                        <option value="anggota">Anggota</option>
                                                        </select>
													</div>
                                                    <div class="form-group">
														<label for="text-input7">Hak Akses</label>
														<select name="akses" style="width:300px" class="form-control">
                                                        <option value="kominfo">Kominfo</option>
                                                        <option value="litbang">Litbang</option>
                                                        <option value="dosen">Dosen</option>
                                                        <option value="anggota">Anggota</option>
                                                        </select>
													</div>
                                                    <hr />
													<div class="form-group">
														<p>Password User</p>
														<input type="password" name="pass" id="pass" class="form-control" required/>
													</div>
                                                    <div class="form-group">
														<p>Verifikasi Password</p>
														<input type="password" name="pass1" id="pass1" class="form-control" required/>
													</div>
                                                    <hr />
                                                    <div class="form-group">
														 <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
														<button type="submit" class="btn btn-custom-primary">Save changes</button>
													</div>
                                                    </form>
                                                   
											</div>
										</div>
										<!-- END ADVANCED VALIDATION -->
							</div>
						</div>
					</div>
				</div>
		</div>	
	</div>
	<!-- END MODAL DIALOG -->	
	
	<div class="widget widget-table">
		<div class="widget-content">
			<table id="visit-stat-table" class="table  table-striped table-hover datatable" cellpadding="0" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>No.BP/NIP</th>
						<th>Nama User</th>
						<th>Tempat/Tanggal Lahir</th>
						<th>Alamat</th>
                        <th>No.HP</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Edit</th>
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
									echo"<tr>"
									. "<td>".$i."</td>"
                                    . "<td>".$data['id_anggota']."</td>"
                                    . "<td>".$data['nama']."</td>"
                                    . "<td>".$data['tempat_lahir']."/".$data['tanggal_lahir']."</td>"
									. "<td>".$data['alamat']."</td>"
                                    . "<td>".$data['no_hp']."</td>"
									. "<td>".$data['email']."</td>"
									. "<td>".$data['jabatan']."</td>"
                                    . "<td><a href='view/mainProcess.php?act=deleteUser&id=".$data['id_anggota']."' class='btn btn-primary btn-xs'>​Delete</a></td>"
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