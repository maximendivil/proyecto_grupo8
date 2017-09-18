<?php
class Database {
	private static $dbName="grupo_8";
	private static $dbHost="localhost";
	private static $dbUsername="grupo_8";
	private static $dbPassword="Qyd03i1b9ia3p1T6";
	
	private static $cont = null;
	
	public function __construct(){
		die('Init function is not allowed');
	}
	
	public static function connect(){
		
		//Una conexión para toda la aplicación
		if(null == self::$cont){
			try
			{
			  $con = new PDO('mysql:host=localhost;dbname=grupo_8', $dbUsername, $dbPassword);
			  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e)
			{
			  echo 'Error conectando con la base de datos: ' . $e->getMessage();
			}
		}
		return self::$cont;
	}
	
	public static function disconnect(){
		self::$cont = null;
	}
}

?>