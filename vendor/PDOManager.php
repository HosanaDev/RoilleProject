<?php

// CETTE CLASSE GERE TOUT CE QUI CONCERNE LA CONNEXION A LA BASE DE DONNEE
// NOUS ESSAYONS DE RESPECTER AU MIEUX LE DESIGN PATTERN SIGLETON

Class PDOManager
{
	// INSTANCE DE LA BASE DE DONN2E
	private static $instance = NULL; 

	// INSTANCE DE PDO
	private $pdo; 
	
	// CONSTRUCTEUR DE LA BASE DE DONNEE	
	private function __construct(){} 
	private function __clone(){}
	
	// FUNCTION PERMETTANT DE CREER INSTANCE DE L'OBJET PDO
	public static function getInstance(){
		if(is_null(self::$instance))
		{
			self::$instance = new self;
		}
		return self::$instance; 
	}
	
	// FUNCTION DE CONNEXION A LA BASE DE DONNEES
	public function getPdo()
	{
		$options = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			                                   	      PDO::ATTR_EMULATE_PREPARES => false,
											          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
											   );
		require('parameters.php');

		$this -> pdo = new PDO('mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname']			                        , $parameters['login'], $parameters['password'], $options); 
		return $this -> pdo;
	}
}

