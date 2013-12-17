<?php
$database = "etunote";
$username = "root";
$passwd = "";

try {
	$db = new PDO('mysql:host=localhost;dbname='.$database, $username, $passwd);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//die("ok");
}
catch (PDOException $e){
	print_r($e->getMessage());
	die("Connexion Error");
}
