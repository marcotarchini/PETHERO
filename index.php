<?php
 
	ini_set('display_errors', 1);//Muestra errores por pantalla
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
		
	Autoload::start();//Se inicia para cargar las clases

	session_start();//Inicia sesiones

	require_once(VIEWS_PATH."header.php");//Encabezado que se repite

	Router::Route(new Request());

	require_once(VIEWS_PATH."footer.php");//Final de pagina que se repite
?>