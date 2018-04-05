<?php

// CONNEXION A LA BASE DE DONNEE

$pdo = new PDO ("mysql:host=localhost;dbname=Roille", "root", "", 
				array(
						PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
						PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
					 )
				);

// OUVERTURE DE SESSION 

session_start ();

// CHEMINS

define('RACINE_SITE', '/Roille/');
define('RACINE_SERVEUR', $_SERVER["DOCUMENT_ROOT"]);

// Globals

$page = "";
$msg = "";


// Autres inclusions

require_once ("functions.inc.php");

?>
