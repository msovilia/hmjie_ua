<?php
	require_once ('mainClass.php');
    class proker extends dbController
	{
        public function getProker()
		{
            $this->dbOpen();
            
            $sql = "SELECT * FROM proker ORDER BY tanggal DESC";
            $query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
            $num_results = mysqli_num_rows($query);
            
            if ($num_results > 0)
			{
                $i=0;
                while ($row = mysqli_fetch_array($query))
				{
                    $dataProker[$i]['id'] = $row[0];
                    $dataProker[$i]['nama_proker'] = $row[1];
                    $dataProker[$i]['divisi'] = $row[2];
                    $dataProker[$i]['tujuan'] = $row[3];
                    $dataProker[$i]['sasaran'] = $row[4];
                    $dataProker[$i]['waktu'] = $row[5];
					$dataProker[$i]['waktu1'] = $row[6];
                    $dataProker[$i]['dana'] = $row[7];
                    
                    
                   
                    $i++;
                }  
			}
			else 
			{
                    $dataProker = null;
            }
            unset($i);
            $this->dbClose();
            return $dataProker;
            
        }
		
		 public function getProker2()
		{
            $this->dbOpen();
            
            $sql = "SELECT * FROM proker ORDER BY divisi_pelaksana";
            $query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
            $num_results = mysqli_num_rows($query);
            
            if ($num_results > 0)
			{
                $i=0;
                while ($row = mysqli_fetch_array($query))
				{
                    $dataProker[$i]['nama_proker'] = $row[1];
                    
                    
                   
                    $i++;
                }  
			}
			else 
			{
                    $dataProker = null;
            }
            unset($i);
            $this->dbClose();
            return $dataProker;
            
        }
        
         public function getFoto()
		 {
                $this->dbOpen();   
             
                $foto="SELECT * FROM galery GROUP BY nama_proker";
				$query = mysqli_query($this->conn, $foto) or die(mysqli_error($this->conn));
                $num_results = mysqli_num_rows($query);
            
                if ($num_results > 0)
			     {
                        $i=0;
                        while ($row = mysqli_fetch_array($query))
				            {
                                $dataFoto[$i]['nama'] = $row['1'];
				                $dataFoto[$i]['foto'] = "server/foto/".$row['2'];
                            
                                $i++;
                            } 
                }
                else 
			    {
                    $dataFoto = null;
                }
             
             
             
            unset($i);
            $this->dbClose();
            return $dataFoto;
         }
		 
		  public function getFoto3()
		 {
                $this->dbOpen();   
             
                $foto="SELECT * FROM galery ORDER BY nama_proker";
				$query = mysqli_query($this->conn, $foto) or die(mysqli_error($this->conn));
                $num_results = mysqli_num_rows($query);
            
                if ($num_results > 0)
			     {
                        $i=0;
                        while ($row = mysqli_fetch_array($query))
				            {
								$dataFoto[$i]['id'] = $row['0'];
                                $dataFoto[$i]['nama'] = $row['1'];
				                $dataFoto[$i]['foto'] = $row['2'];
                            
                                $i++;
                            } 
                }
                else 
			    {
                    $dataFoto = null;
                }
             
             
             
            unset($i);
            $this->dbClose();
            return $dataFoto;
         }
        
         public function getFoto2($id)
		 {
                $this->dbOpen();   
             
                $foto="SELECT * FROM galery WHERE nama_proker='$id'";
				$query = mysqli_query($this->conn, $foto) or die(mysqli_error($this->conn));
                $num_results = mysqli_num_rows($query);
            
                if ($num_results > 0)
			     {
                        $i=0;
                        while ($row = mysqli_fetch_array($query))
				            {
                                $dataFoto1[$i]['nama'] = $row['1'];
				                $dataFoto1[$i]['foto'] = "server/foto/".$row['2'];
                            
                                $i++;
                            } 
                }
                else 
			    {
                    $dataFoto1 = null;
                }
             
             
             
            unset($i);
            $this->dbClose();
            return $dataFoto1;
         }
		
		public function saveProker($nama, $divisi, $tujuan, $sasaran, $tanggal, $tanggal2, $sumber) 
				{
					$this->dbOpen();
					$nama = mysqli_real_escape_string($this->conn, $nama);
					$divisi = mysqli_real_escape_string($this->conn, $divisi);
					$tujuan = mysqli_real_escape_string($this->conn, $tujuan);
					$sasaran = mysqli_real_escape_string($this->conn, $sasaran);
					$tanggal = mysqli_real_escape_string($this->conn, $tanggal);
					$tanggal2 = mysqli_real_escape_string($this->conn, $tanggal2);
					$sumber = mysqli_real_escape_string($this->conn, $sumber);
				
					$sql="INSERT INTO proker VALUES ('', '$nama', '$divisi', '$tujuan', '$sasaran', '$tanggal', '$tanggal2', '$sumber')";
					$query=mysqli_query($this->conn, $sql);
					if ($query==true)
					{
						header('Location: ../admin.php?p=tambah&sub=proker&message=sukses');
					}
					else 
					{
						header('Location: ../admin.php?p=tambah&sub=proker&message=gagal');
					}
					$this->dbClose();
				}
        
        public function saveGalery($nama, $foto, $data) 
				{
					$this->dbOpen();
					$nama = mysqli_real_escape_string($this->conn, $nama);
					$foto = mysqli_real_escape_string($this->conn, $foto);
					
					
					$target = "../server/foto/"; 
					$target = $target . basename($foto); 
					
					if(move_uploaded_file($data, $target))
							{
								if(!get_magic_quotes_gpc())
									{
										$foto = addslashes($foto);
										$target = addslashes($target);
									} 
							}
						else
							{
								header('Location: ../admin.php?p=galery&message=gagal');
							}
				
					$sql="INSERT INTO galery VALUES ('', '$nama', '$foto')";
					$query=mysqli_query($this->conn, $sql);
					if ($query==true)
					{
						header('Location: ../admin.php?p=galery&message=sukses');
					}
					else 
					{
						header('Location: ../admin.php?p=galery&message=gagal');
					}
					$this->dbClose();
				}
			
			public function deleteFoto($id)
				{
					$this->dbOpen();
					$id = mysqli_real_escape_string($this->conn, $id);
					
					$sql="DELETE FROM galery where id='$id'";
					$query = mysqli_query($this->conn, $sql);
					if ($query==true)
						{
							header('Location: ../admin.php?p=galery&message=suksesdelete');
						}
					else
						{
							header('Location: ../admin.php?p=galery&message=gagaldelete');
						}
					$this->dbClose();
				}
			
			public function downloadFoto($id)
				{
					$this->dbOpen();
					$sql="SELECT * from galery where id='$id'";
					$result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
					
					$row = mysqli_fetch_array($result);
					$nama=$row['2'];
									
					$contenttype = "application/octet-stream";
					header("Content-Disposition: attachment; filename=\"" . basename($nama) . "\";");
					readfile('../server/foto/'.$nama);
					exit();
						
				}
                
    }
?>