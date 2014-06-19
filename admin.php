<?php
session_start();
$function='class/mainClass.php';
require($function);
$webApp = new webApp();
$webApp->createWebApp();
//echo $_SESSION['username'];
?>