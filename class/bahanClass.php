<?php
	class bahan extends dbController
		{
			public function getBahan()
				{
					$this->dbOpen();
					
					$sql = "SELECT * FROM file_kuliah WHERE status='1' ORDER BY id_file DESC";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					$num_results = mysqli_num_rows($query); 
					
					if ($num_results > 0)
						{ 
							$i=0;
							while ($row = mysqli_fetch_array($query))
								{
									$dataBahan[$i]['id_file'] = $row[0];
									$dataBahan[$i]['nama'] = $row[1];
									$dataBahan[$i]['size'] = $row[3];	
									$dataBahan[$i]['jenis_matkul'] = $row[6];
									$dataBahan[$i]['keterangan'] = $row[8];	
									
									$id=$row['5'];
									
									$cek="SELECT nama FROM user WHERE id_anggota='$id'";
									$query1 = mysqli_query($this->conn, $cek);
									$row2 =  mysqli_fetch_array($query1);
									$dataBahan[$i]['nama1'] = $row2['0'];
									$i++;
									
								}
						}
					else
						{ 
							$dataBahan = null;
						}
					
					unset($i);
					$this->dbClose();
					return $dataBahan;        
				}
		
			public function getBahan2()
				{
					$this->dbOpen();
					
					$sql = "SELECT * FROM file_kuliah WHERE status='0' ORDER BY id_file DESC";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					$num_results = mysqli_num_rows($query); 
					
					if ($num_results > 0)
						{ 
							$i=0;
							while ($row = mysqli_fetch_array($query))
								{
									$dataBahan[$i]['id_file'] = $row[0];
									$dataBahan[$i]['nama'] = $row[1];
									$dataBahan[$i]['size'] = $row[3];	
									$dataBahan[$i]['jenis_matkul'] = $row[6];
									$dataBahan[$i]['keterangan'] = $row[8];	
									
									$id=$row['5'];
									
									$cek="SELECT nama FROM user WHERE id_anggota='$id'";
									$query1 = mysqli_query($this->conn, $cek);
									$row2 =  mysqli_fetch_array($query1);
									$dataBahan[$i]['nama1'] = $row2['0'];
									$i++;
									
								}
						}
					else
						{ 
							$dataBahan = null;
						}
					
					unset($i);
					$this->dbClose();
					return $dataBahan;        
				}
		
			public function download($id)
				{
					$this->dbOpen();
					$sql="SELECT nama,type_file,size from file_kuliah where id_file='$id'";
					$result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					
					$row = mysqli_fetch_array($result);
					$nama=$row['nama'];
					$size=$row['size'];
					$type=$row['type_file'];
									
					$contenttype = "application/octet-stream";
					header("Content-Type: " . $type);
					header("Content-Disposition: attachment; filename=\"" . basename($nama) . "\";");
					readfile('../server/file/'.$nama);
					exit();
						
				}
			
			public function saveBahan($matkul, $tipe, $ket, $nama, $type2, $size, $file) 
				{
					$this->dbOpen();
					$matkul = mysqli_real_escape_string($this->conn, $matkul);
					$tipe= mysqli_real_escape_string($this->conn, $tipe);
					$ket = mysqli_real_escape_string($this->conn, $ket);
					$nama= mysqli_real_escape_string($this->conn, $nama);			
					$type2= mysqli_real_escape_string($this->conn, $type2);
					$size= mysqli_real_escape_string($this->conn, $size);
					
					$target = "../server/file/"; 
					$target = $target . basename($nama); 
					
					if(move_uploaded_file($file, $target))
							{
								if(!get_magic_quotes_gpc())
									{
									$nama = addslashes($nama);
									$target = addslashes($target);
									} 
							}
						else
							{
								header('Location: ../admin.php?p=bahan&sub=kuliah&message=gagal');
							}
					
					$idanggota=$_SESSION['username'];
					
					$foto="SELECT * FROM user where id_anggota='$idanggota'";
					$query2 = mysqli_query($this->conn, $foto);
					$row3 =  mysqli_fetch_array($query2);
					
					if($row3['8']=='dosen')
						{
							$sql="INSERT INTO file_kuliah VALUES ('', '$nama', '$type2', '$size', NOW(), '$idanggota', '$matkul', '$tipe', '$ket', '1')";
							$query=mysqli_query($this->conn, $sql);
							if ($query==true)
							{
								header('Location: ../admin.php?p=bahan&sub=kuliah&message=sukses');
							}
							else 
							{
								header('Location: ../admin.php?p=bahan&sub=kuliah&message=gagal');
							}
						}
					else
						{
							$sql="INSERT INTO file_kuliah VALUES ('', '$nama', '$type2', '$size', NOW(), '$idanggota', '$matkul', '$tipe', '$ket', '0')";
							$query=mysqli_query($this->conn, $sql);
							if ($query==true)
							{
								header('Location: ../admin.php?p=bahan&sub=kuliah&message=sukses');
							}
							else 
							{
								header('Location: ../admin.php?p=bahan&sub=kuliah&message=gagal');
							}
						}
					$this->dbClose();
				
					
				}
			
			public function editBahan($id)
				{
					$this->dbOpen();
					$id = mysqli_real_escape_string($this->conn, $id);
					
					$sql="UPDATE file_kuliah SET status='1' where id_file='$id'";
					$query = mysqli_query($this->conn, $sql);
					if ($query==true)
						{
							header('Location: ../admin.php?p=seleksi&sub=bahan&message=suksespost');
						}
					else
						{
							header('Location: ../admin.php?p=seleksi&sub=bahan&message=gagalpost');
						}
					$this->dbClose();
				}
			
			public function deleteBahan($id)
				{
					$this->dbOpen();
					$id = mysqli_real_escape_string($this->conn, $id);
					
					$sql="DELETE FROM file_kuliah where id_file='$id'";
					$query = mysqli_query($this->conn, $sql);
					if ($query==true)
						{
							header('Location: ../admin.php?p=seleksi&sub=bahan&message=suksesdelete');
						}
					else
						{
							header('Location: ../admin.php?p=seleksi&sub=bahan&message=gagaldelete');
						}
					$this->dbClose();
				}
		
	}