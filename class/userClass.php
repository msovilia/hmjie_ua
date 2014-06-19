<?php
	class user extends dbController
		{
			public function getUser()
				{
					$this->dbOpen();
					
					$sql = "SELECT * FROM user ORDER BY jabatan DESC";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					$num_results = mysqli_num_rows($query); 
					
					if ($num_results > 0)
						{ 
							$i=0;
							while ($row = mysqli_fetch_array($query))
								{
									$dataUser[$i]['id_anggota'] = $row[0];
									$dataUser[$i]['nama'] = $row[2];
									$dataUser[$i]['tempat_lahir'] = $row[3];	
									$dataUser[$i]['tanggal_lahir'] = $row[4];
									$dataUser[$i]['alamat'] = $row[5];
									$dataUser[$i]['no_hp'] = $row[6];
									$dataUser[$i]['email'] = $row[7];
									$dataUser[$i]['jabatan'] = $row[8];
									
									$id = $row[0];
									
									$foto="SELECT * FROM akses where id_anggota='$id'";
									$query2 = mysqli_query($this->conn, $foto);
									$row3 =  mysqli_fetch_array($query2);
									
									if($row3>0)
										{
											$dataUser[$i]['akses'] = $row3['2'];
										}
									else
										{
											$dataUser[$i]['akses'] = "null";
										}
												
													
									$i++;
								}
						}
					else
						{ 
							$dataUser = null;
						}
					
					unset($i);
					$this->dbClose();
					return $dataUser;        
				}
		
		public function getUser2()
				{
					$this->dbOpen();
					
					$sql = "SELECT * FROM user WHERE jabatan='dosen' ORDER BY nama";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					$num_results = mysqli_num_rows($query); 
					
					if ($num_results > 0)
						{ 
							$i=0;
							while ($row = mysqli_fetch_array($query))
								{
									$dataUser[$i]['id_anggota'] = $row[0];
									$dataUser[$i]['nama'] = $row[2];
									$dataUser[$i]['jabatan'] = $row[8];
									
									$id = $row['0'];
							
									$foto="SELECT * FROM foto where id_anggota='$id'";
									$query2 = mysqli_query($this->conn, $foto);
									$row3 =  mysqli_fetch_array($query2);
									
									if($row3>0)
										{
											$dataUser[$i]['foto'] = "server/foto/".$row3['2'];
										}
									else
										{
											$dataUser[$i]['foto'] = "server/foto/images.jpg";
										}
																							
									$i++;
								}
						}
					else
						{ 
							$dataUser = null;
						}
					
					unset($i);
					$this->dbClose();
					return $dataUser;     
				}
		
		public function getUser3()
				{	
					$this->dbOpen();
						
					$sql1 = "SELECT * FROM user WHERE jabatan='anggota' ORDER BY nama";
					$query1 = mysqli_query($this->conn, $sql1) or die(mysqli_error($this->conn));
					$num_results1 = mysqli_num_rows($query1); 
					
					if ($num_results1 > 0)
						{ 
							$i=0;
							while ($row1 = mysqli_fetch_array($query1))
								{
									$dataUser1[$i]['id_anggota'] = $row1[0];
									$dataUser1[$i]['nama'] = $row1[2];
									$dataUser1[$i]['jabatan'] = $row1[8];	
									
									$id = $row1['0'];
							
									$foto="SELECT * FROM foto where id_anggota='$id'";
									$query2 = mysqli_query($this->conn, $foto);
									$row3 =  mysqli_fetch_array($query2);
									
									if($row3>0)
										{
											$dataUser1[$i]['foto'] = "server/foto/".$row3['2'];
										}
									else
										{
											$dataUser1[$i]['foto'] = "server/foto/images.jpg";
										}
												
									$i++;
								}
						}
					else
						{ 
							$dataUser1 = null;
						}
					
					unset($i);
					$this->dbClose();
					return $dataUser1;        
				}
		
		public function editAkses($jabatan, $akses, $id)
				{	
					$this->dbOpen();
					$jabatan = mysqli_real_escape_string($this->conn, $jabatan);
					$akses = mysqli_real_escape_string($this->conn, $akses);
					$id = mysqli_real_escape_string($this->conn, $id);
					
					$sql = "UPDATE user SET jabatan='$jabatan' WHERE id_anggota='$id'";
					$query = mysqli_query($this->conn, $sql);
					
					$sql1 = "UPDATE akses SET akses='$akses' WHERE id_anggota='$id'";
					$query1 = mysqli_query($this->conn, $sql1);
					
					if (($query==true)&&($query1==true))
						{
							header('Location: ../admin.php?p=akses&sub=anggota&message=sukses');
						}
					else
						{
							header('Location: ../admin.php?p=akses&sub=anggota&message=gagal');
		   				}
		   			$this->dbClose();    
				}
		
		public function getUser4()
				{	
					$this->dbOpen();
						
					$sql1 = "SELECT * FROM user WHERE jabatan='pengurus' ORDER BY nama";
					$query1 = mysqli_query($this->conn, $sql1) or die(mysqli_error($this->conn));
					$num_results1 = mysqli_num_rows($query1); 
					
					if ($num_results1 > 0)
						{ 
							$i=0;
							while ($row1 = mysqli_fetch_array($query1))
								{
									$dataUser2[$i]['id_anggota'] = $row1[0];
									$dataUser2[$i]['nama'] = $row1[2];
									$dataUser2[$i]['jabatan'] = $row1[8];
									
									$id = $row1['0'];
							
									$foto="SELECT * FROM foto where id_anggota='$id'";
									$query2 = mysqli_query($this->conn, $foto);
									$row3 =  mysqli_fetch_array($query2);
									
									if($row3>0)
										{
											$dataUser2[$i]['foto'] = "server/foto/".$row3['2'];
										}
									else
										{
											$dataUser2[$i]['foto'] = "server/foto/images.jpg";
										}
													
									$i++;
								}
						}
					else
						{ 
							$dataUser2 = null;
						}
					
					unset($i);
					$this->dbClose();
					return $dataUser2;        
				}
		
		public function cekUser($id)
			{
				$this->dbOpen();
				$sql = "SELECT COUNT(*) AS cekUser FROM user WHERE id_anggota = '$id'";
				$query = mysqli_query($this->conn, $sql);
				$row =  mysqli_fetch_array($query);
				$rows = $row['cekUser'];
				return $rows;
			}
		
		public function saveUser($id, $nama, $tempat, $tanggal, $alamat, $nohp, $email, $jabatan, $pass, $akses, $pass1) 
			{
				$this->dbOpen();
				$id = mysqli_real_escape_string($this->conn, $id);
				$pass= mysqli_real_escape_string($this->conn, $pass);
				$nama= mysqli_real_escape_string($this->conn, $nama);
				$tempat = mysqli_real_escape_string($this->conn, $tempat);
				$tanggal= mysqli_real_escape_string($this->conn, $tanggal);			
				$alamat= mysqli_real_escape_string($this->conn, $alamat);
				$nohp= mysqli_real_escape_string($this->conn, $nohp);
				$email= mysqli_real_escape_string($this->conn, $email);
				$jabatan= mysqli_real_escape_string($this->conn, $jabatan);
				$akses= mysqli_real_escape_string($this->conn, $akses);
				$pass1= mysqli_real_escape_string($this->conn, $pass1);
								
				$cek= $this->cekUser($id);
				
				if($cek!=0)
					{
						header('Location: ../admin.php?p=user&sub=anggota&message=duplikat');
					}
				else
					{
						if($pass == $pass1)
							{
								$sql="INSERT INTO user VALUES ('$id', '$pass', '$nama', '$tempat', '$tanggal', '$alamat', '$nohp', '$email', '$jabatan')";
								$query=mysqli_query($this->conn, $sql);
								
								$sql1="INSERT INTO akses VALUES ('', '$id', '$akses')";
								$query1=mysqli_query($this->conn, $sql1);
								
								if ($query==true && $query1==true)
									{
										header('Location: ../admin.php?p=user&sub=anggota&message=sukses');
									}
								else
									{
										header('Location: ../admin.php?p=user&sub=anggota&message=gagal');
									}
							}
						else
							{
								header('Location: ../admin.php?p=user&sub=anggota&message=gagalverifikasi');
							}
						$this->dbClose();
				}
			}
			
			public function deleteUser($id)
				{
					$this->dbOpen();
					$id = mysqli_real_escape_string($this->conn, $id);
					
					$sql = "DELETE FROM user WHERE id_anggota='$id'";
					$query = mysqli_query($this->conn, $sql);
					if ($query==true)
						{
							header('Location: ../admin.php?p=user&sub=anggota&message=hapus');
						}
					else
						{
							header('Location: ../admin.php?p=user&sub=anggota&message=gagalhapus');
		   				}
		   			$this->dbClose();
				}
		
	}