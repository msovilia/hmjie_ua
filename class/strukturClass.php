<?php
    class struktur extends dbController
	{		
		public function getStruktur()
				{
					$this->dbOpen();
					
					$sql = "SELECT * FROM struktur_organisasi ORDER BY id_struktur DESC";
					$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					
					$row = mysqli_fetch_array($query);
								
					if($row>0)
						{
							$dataStruktur['nama'] = $row['1'];
							$dataStruktur['foto'] = "server/foto/".$row['2'];
						}
					else
						{ 
							$dataStruktur = null;
						}
					
					$this->dbClose();
					return $dataStruktur;        
				}
		
		public function saveStruktur($nama, $nama2, $type, $size, $data) 
				{
					$this->dbOpen();
					$nama = mysqli_real_escape_string($this->conn, $nama);
					$nama2 = mysqli_real_escape_string($this->conn, $nama2);
					$type = mysqli_real_escape_string($this->conn, $type);
					$size = mysqli_real_escape_string($this->conn, $size);
					
					$target = "../server/foto/"; 
					$target = $target . basename($nama2); 
					
					if(move_uploaded_file($data, $target))
							{
								if(!get_magic_quotes_gpc())
									{
										$nama2 = addslashes($nama2);
										$target = addslashes($target);
									} 
							}
						else
							{
								header('Location: ../admin.php?p=upload&sub=struktur&message=gagal');
							}
				
					$sql="INSERT INTO struktur_organisasi VALUES ('', '$nama', '$nama2', '$type', '$size')";
					$query=mysqli_query($this->conn, $sql);
					if ($query==true)
					{
						header('Location: ../admin.php?p=upload&sub=struktur&message=sukses');
					}
					else 
					{
						header('Location: ../admin.php?p=upload&sub=struktur&message=gagal');
					}
					$this->dbClose();
				}
                
    }
?>