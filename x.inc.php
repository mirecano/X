<?php
	namespace X;

	/**
	*
	* Definim les variables globals del framework
	*
	**/

	require_once __DIR__.'/sys/autoload.php';

	define('DS', DIRECTORY_SEPARATOR);
	//definim root del nostre sistema
	define('ROOT', realpath(__DIR__).DS); //DS pq no sabem si es linux o windows
	//to access to filesystem
	define('APP', ROOT.'app'.DS);
	define('APP_W', dirname($_SERVER['PHP_SELF']));
	