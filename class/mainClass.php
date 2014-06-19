<?php
    class webApp
	{
        public function createWebApp()
			{
            	if(!isset($_SESSION['username']))
					{               
                    	include ('view/page-login.php');
						header('../');                         
            		}
            	else
					{
                		include ('view/home.php');
            		}
        	}
		
        public function loadContent()
			{
            	if(!isset($_GET['p']))
					{
                		$page="view/content/dashboard.php";
            		}
            	else if (isset($_GET['p']))
					{
						if(isset($_GET['sub'])) 
							{
								$page="view/content/".$_GET['p']."_".$_GET['sub'].".php";
							}
						else
							{
								$page="view/content/".$_GET['p'].".php";
							}
            		}
					
            	if(file_exists($page))
					{
                		include($page);
            		}
            	else
					{
						echo '<script>document.location="404.php"</script>';
            		}
        }
    }
	
	class dbController
		{
        	private $host="localhost";
        	private $user="root";
        	private $pass="";
        	private $dbname="hmjie";
        	protected $conn;
        
        	protected function dbOpen()
				{
            		$this->conn = mysqli_connect("$this->host", "$this->user", "$this->pass", "$this->dbname");
            		if(mysqli_connect_error())
						{
                			echo "Koneksi ke database MySQL gagal: ".  mysqli_connect_error();
            			}      
       			}
        
     		protected function dbClose()
				{
            		mysqli_close($this->conn);
        		}
    	}
    
    class userController extends dbController
	{
        public function userLogin($username, $pass)
			{
            	$this->dbOpen();
            	$username= mysqli_real_escape_string($this->conn, $username);
            	$pass= mysqli_real_escape_string($this->conn, $pass);
            	//$pass= md5($pass);
            	$sql="SELECT id_anggota,jabatan,nama FROM user WHERE id_anggota='$username' AND password='$pass'";
            	$query=mysqli_query($this->conn, $sql);
				
            	if(mysqli_num_rows($query)==1)
					{
                		while ($row=  mysqli_fetch_array($query))
							{
								$_SESSION['jabatan'] = $row['jabatan'];
								$_SESSION['username'] = $row['id_anggota'];
								$_SESSION['name'] = $row['nama'];
								
								$id = $_SESSION['username'];
								
								$akses="SELECT * FROM akses where id_anggota='$id'";
								$query2 = mysqli_query($this->conn, $akses);
								$row3 =  mysqli_fetch_array($query2);
								
								$_SESSION['akses'] = $row3['2'];
							}       
					
						$this->dbClose();
					}
			
            else
				{
               			$_SESSION['login']='fail';
            	}       
			header('Location: ../admin.php');
        }
        
        public function userLogout()
			{
            	unset($_SESSION['jabatan']);            
            	unset($_SESSION['username']);
				unset($_SESSION['akses']);
            	header('Location: ../');
        	}
		
    }

class pagination extends dbController
	{
		function totalRecord($table, $limit)
		{
			$this->dbOpen();		
			$table= mysqli_real_escape_string($this->conn, $table);
			
			$sql = "SELECT COUNT(*) AS count FROM $table";			
			
			$query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
			
			$row =  mysqli_fetch_array($query);
			$total_records = $row['count'];
			$total_pages = ceil($total_records / 10);  
			return $total_pages;
		}
	}
    
?>