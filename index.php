<?php
	//developer mode
	error_reporting(E_ALL);

	ini_set('display_errors', 1);

	//fitxer de configuracio
	include 'x.inc.php';
	
	use \X\Sys\Autoload;
	use \X\Sys\Core;
	use \X\Sys\Registry;

	
	$loader=new Autoload();
	$loader->register();

	//Registre de Namespace de ruta actual
	$loader->addNamespace('X\Sys', 'sys');
	$loader->addNamespace('X\App', 'app');
	$loader->addNamespace('X\App\Controllers', 'app/controllers');
	$loader->addNamespace('X\App\Models', 'app/models');
	$loader->addNamespace('X\App\Views', 'app/views');



	Core::init();