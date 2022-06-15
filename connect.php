<?php
	try{
		$db = new PDO("mysql:host=localhost;dbname=palaceking;charset=utf8", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		//echo"connexion établie";
	}
	catch (PDOException $pe){
	    echo 'ERREUR :'.$pe->getMessage();
	    die('Erreur : '.$pe->getMessage());
	}

?>

