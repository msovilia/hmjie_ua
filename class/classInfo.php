<?php
	class info extends dbController
		{
			public function getInfo($start)
				{
					$this->dbOpen();
					
					$start= mysqli_real_escape_string($this->conn, $start);
					
					if($start == "*"){
						$kondisi = "";
					}	
					else {
						$kondisi = "LIMIT $start, 10";
					}
					
					$sql = "SELECT * FROM informasi ORDER BY tanggal DESC $kondisi";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					$num_results = mysqli_num_rows($query); 
					
					if ($num_results > 0)
						{ 
							$i=0;
							while ($row = mysqli_fetch_array($query))
								{
									$dataInfo[$i]['id_anggota'] = $row[1];
									$dataInfo[$i]['tanggal'] = $row[2];
									$dataInfo[$i]['informasi'] = $row[3];	
									
									$id=$row['1'];
									
									$cek="SELECT nama FROM user WHERE id_anggota='$id'";
									$query1 = mysqli_query($this->conn, $cek);
									$row2 =  mysqli_fetch_array($query1);
									$dataInfo[$i]['nama1'] = $row2['0'];
									
									$foto="SELECT * FROM foto where id_anggota='$id'";
									$query2 = mysqli_query($this->conn, $foto);
									$row3 =  mysqli_fetch_array($query2);
									
									if($row3>0)
										{
											$dataInfo[$i]['foto'] = "server/foto/".$row3['2'];
										}
									else
										{
											$dataInfo[$i]['foto'] = "server/images.jpg";
										}
									
									$i++;
									
								}
						}
					else
						{ 
							$dataInfo = null;
						}
					
					unset($i);
					$this->dbClose();
					return $dataInfo;        
				}
			
			public function saveInfo($info) 
				{
					$this->dbOpen();
					$info = mysqli_real_escape_string($this->conn, $info);
					
					$idanggota=$_SESSION['username'];
				
					$sql="INSERT INTO informasi VALUES ('', '$idanggota', NOW(), '$info')";
					$query=mysqli_query($this->conn, $sql);
					if ($query==true)
					{
						header('Location: ../admin.php?message=sukses');
					}
					else 
					{
						header('Location: ../admin.php?message=gagal');
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