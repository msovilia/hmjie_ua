<?php
	session_start();
    require_once ('../class/mainClass.php');
	require_once ('../class/bahanClass.php');
	require_once ('../class/userClass.php');
	require_once ('../class/classInfo.php');
	require_once ('../class/profileClass.php');
	require_once ('../class/ClassProker.php');
	require_once ('../class/strukturClass.php');
	
	$act=$_GET['act'];
    
	if($act==null)
		{
			header('Location: ../');
		}

	else
		{
			if($act=='login')
				{
					$username= new userController();            
					$username->userLogin($_POST['username'], $_POST['password']);
				}

			else if ($act=='logout')
				{
					$username= new userController();
					$username->userLogout();
				}
		  	else if($act=='saveBahan')
		  		{
					$newBahan = new Bahan();
					$newBahan->saveBahan($_POST['matkul'], $_POST['tipe'], $_POST['ket'], $_FILES['file']['name'], $_FILES['file']['type'], $_FILES['file']['size'], $_FILES['file']['tmp_name']);
				}
			else if ($act=='download')
		 		{
					$newBahan= new Bahan();
					$newBahan->download($_GET['id']);
				}
			else if ($act=='editBahan')
		 		{
					$newBahan= new Bahan();
					$newBahan->editBahan($_GET['id']);
				}
			else if ($act=='deleteBahan')
		 		{
					$newBahan= new Bahan();
					$newBahan->deleteBahan($_GET['id']);
				}
			else if($act=='saveUser')
		  		{
					$newUser = new user();
					$newUser->saveUser($_POST['id'], $_POST['nama'], $_POST['tempat'], $_POST['tanggal'], $_POST['alamat'], $_POST['nohp'], $_POST['email'], $_POST['jabatan'], $_POST['pass'], $_POST['akses'], $_POST['pass1']);
				}
			else if ($act=='deleteUser')
		 		{
					$newUser= new user();
					$newUser->deleteUser($_GET['id']);
				}
			else if($act=='editProfil')
		  		{
					$newProfil = new profile();
					$newProfil->editProfil($_POST['nama'], $_POST['tempat'], $_POST['tanggal'], $_POST['alamat'], $_POST['nohp'], $_POST['email']);
				}
			else if ($act=='editPass')
		 		{
					$newProfil= new profile();
					$newProfil->editPass($_POST['lama'], $_POST['baru'], $_POST['baru1']);
				}
			else if ($act=='saveInfo')
		 		{
					$newInfo= new info();
					$newInfo->saveInfo($_POST['info']);
				}
			else if ($act=='saveFoto')
		 		{
					$newProfil= new profile();
					$newProfil->saveFoto($_FILES['file']['name'], $_FILES['file']['type'], $_FILES['file']['size'], $_FILES['file']['tmp_name']);
				}
			else if ($act=='saveProker')
		 		{
					$newProker= new proker();
					$newProker->saveProker($_POST['nama'], $_POST['divisi'], $_POST['tujuan'], $_POST['sasaran'], $_POST['tanggal'], $_POST['tanggal2'], $_POST['sumber']);
				}
			else if ($act=='saveStruktur')
		 		{
					$newStruktur= new struktur();
					$newStruktur->saveStruktur($_POST['nama'], $_FILES['file']['name'], $_FILES['file']['type'], $_FILES['file']['size'], $_FILES['file']['tmp_name']);
				}
            else if ($act=='saveGalery')
		 		{
					$newProker= new proker();
					$newProker->saveGalery($_POST['galery'], $_FILES['file']['name'], $_FILES['file']['tmp_name']);
				}
			else if ($act=='editAkses')
		 		{
					$newUser= new user();
					$newUser->editAkses($_POST['jabatan'], $_POST['akses'], $_GET['id']);
				}
			else if ($act=='deleteFoto')
		 		{
					$newProker= new proker();
					$newProker->deleteFoto($_GET['id']);
				}
			else if ($act=='downloadFoto')
		 		{
					$newProker= new proker();
					$newProker->downloadFoto($_GET['id']);
				}
		}
?>