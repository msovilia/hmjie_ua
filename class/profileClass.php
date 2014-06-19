<?php
	class profile extends dbController
		{
			public function getProfile()
				{
					$this->dbOpen();
					
					$id = $_SESSION['username'];
					
					$sql = "SELECT * FROM user where id_anggota='$id'";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					
					$row = mysqli_fetch_array($query);
								
					if($row>0)
						{
							$dataProfil['nobp'] = $row['0'];
							$dataProfil['nama'] = $row['2'];
							$dataProfil['tempat_lahir'] = $row['3'];
							$dataProfil['tanggal_lahir'] = $row['4'];
							$dataProfil['alamat'] = $row['5'];
							$dataProfil['nohp'] = $row['6'];
							$dataProfil['email'] = $row['7'];
							
							$id = $row['0'];
							
							$foto="SELECT * FROM foto where id_anggota='$id'";
							$query2 = mysqli_query($this->conn, $foto);
							$row3 =  mysqli_fetch_array($query2);
									
							if($row3>0)
								{
									$dataProfil['foto'] = "server/foto/".$row3['2'];
								}
							else
								{
									$dataProfil['foto'] = "server/foto/images.jpg";
								}		
						}
					else
						{ 
							$dataProfil = null;
						}
					
					$this->dbClose();
					return $dataProfil;        
				}
				
				public function getProfile2($id)
				{
					$this->dbOpen();
					
					$id = mysqli_real_escape_string($this->conn, $id);
					
					$sql = "SELECT * FROM user where id_anggota='$id'";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					
					$row = mysqli_fetch_array($query);
								
					if($row>0)
						{
							$dataProfil1['nobp'] = $row['0'];
							$dataProfil1['nama'] = $row['2'];
							$dataProfil1['tempat_lahir'] = $row['3'];
							$dataProfil1['tanggal_lahir'] = $row['4'];
							$dataProfil1['alamat'] = $row['5'];
							$dataProfil1['nohp'] = $row['6'];
							$dataProfil1['email'] = $row['7'];
							
							$id = $row['0'];
							
							$foto="SELECT * FROM foto where id_anggota='$id'";
							$query2 = mysqli_query($this->conn, $foto);
							$row3 =  mysqli_fetch_array($query2);
									
							if($row3>0)
								{
									$dataProfil1['foto'] = "server/foto/" . $row3['2'];
								}
							else
								{
									$dataProfil1['foto'] = "server/foto/images.jpg";
								}		
						}
					else
						{ 
							$dataProfil1 = null;
						}
					
					$this->dbClose();
					return $dataProfil1;        
				}
				
				public function editProfil($nama, $tempat, $tanggal, $alamat, $nohp, $email)
					{
						$this->dbOpen();
						$nama = mysqli_real_escape_string($this->conn, $nama);
						$tempat = mysqli_real_escape_string($this->conn, $tempat);
						$tanggal = mysqli_real_escape_string($this->conn, $tanggal);
						$alamat = mysqli_real_escape_string($this->conn, $alamat);
						$nohp = mysqli_real_escape_string($this->conn, $nohp);
						$email = mysqli_real_escape_string($this->conn, $email);
						
						$id = $_SESSION['username'];
						
						$sql="UPDATE user SET nama='$nama', tempat_lahir='$tempat', tanngal_lahir='$tanggal', alamat='$alamat', no_hp='$nohp', email='$email' WHERE id_anggota='$id'";
						$query = mysqli_query($this->conn, $sql);
						if ($query==true)
							{
								header('Location: ../admin.php?p=profile&message=editsukses');
							}
						else
							{
								header('Location: ../admin.php?p=profile&message=editgagal');
							}
						
						$this->dbClose();
						
					}
				
				public function editPass($lama, $baru, $baru1)
					{
						$this->dbOpen();
						$lama = mysqli_real_escape_string($this->conn, $lama);
						
						$id = $_SESSION['username'];
						
						$sql1 = "SELECT password from user where id_anggota='$id'";
						$query = mysqli_query($this->conn, $sql1);
						$row = mysqli_fetch_array($query);
						
						$pass = $row['0'];
						if($lama == $pass)
							{
								if($baru == $baru1)
									{
										$sql="UPDATE user SET password='$baru' where id_anggota='$id'";
										$query = mysqli_query($this->conn, $sql);
										if ($query==true)
											{
												header('Location: ../admin.php?p=setting&message=sukses');
											}
										else
											{
												header('Location: ../admin.php?p=setting&message=gagal');
											}
									}
								else
									{
										header('Location: ../admin.php?p=setting&message=gagalverifikasi');
									}
							}
						else
							{
								header('Location: ../admin.php?p=setting&message=gagalsimpan');
							}
						
						
						$this->dbClose();
					}
			
			public function saveFoto($nama, $type, $size, $data)
				{
					$this->dbOpen();
					
					$nama= mysqli_real_escape_string($this->conn, $nama);			
					$type= mysqli_real_escape_string($this->conn, $type);
					$size= mysqli_real_escape_string($this->conn, $size);
					
					$id = $_SESSION['username'];
					
					$sql = "SELECT * FROM foto where id_anggota='$id'";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					
					$row = mysqli_fetch_array($query);
								
					if($row == 0)
						{
								$target = "../server/foto/"; 
								$target = $target . basename($nama); 
								
								if(move_uploaded_file($data, $target))
										{
											if(!get_magic_quotes_gpc())
												{
												$nama = addslashes($nama);
												$target = addslashes($target);
												} 
										}
									else
										{
											header('Location: ../admin.php?p=profile&message=gagal');
										}
							
								$sql="INSERT INTO foto VALUES ('', '$id', '$nama', '$type', '$size')";
								$query=mysqli_query($this->conn, $sql);
								if ($query==true)
								{
									header('Location: ../admin.php?p=profile&message=sukses');
								}
								else 
								{
									header('Location: ../admin.php?p=profile&message=gagal');
								}
						}
					else
						{
								$target = "../server/foto/"; 
								$target = $target . basename($nama);
								
								$id = $row['0'];
								
								if(move_uploaded_file($data, $target))
										{
											if(!get_magic_quotes_gpc())
												{
												$nama = addslashes($nama);
												$target = addslashes($target);
												} 
										}
									else
										{
											header('Location: ../admin.php?p=profile&message=gagal');
										}
							
								$sql="UPDATE foto SET nama_foto='$nama', type='$type', size='$size' WHERE id_foto='$id'";
								$query=mysqli_query($this->conn, $sql);
								if ($query==true)
								{
									header('Location: ../admin.php?p=profile&message=sukses');
								}
								else 
								{
									header('Location: ../admin.php?p=profile&message=gagal');
								}
						}
					$this->dbClose();
				}
		
		}