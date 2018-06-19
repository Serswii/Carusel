<?php 
define('LOGIN','root');
define('PASS','');
define('BD','carusel');
$mysqli = new mysqli('localhost',LOGIN,PASS,BD);
$sql = "SET NAMES 'utf8'";
$mysqli->query($sql);

?>
