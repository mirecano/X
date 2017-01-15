<?php
	namespace X\Sys;
	
	/**
	* Core: Front Controller
	*
	* @author: Mire
	* @package: sys
	*
	**/

	//Core s'encarrega de traduir les request

	use X\Sys\Request;
	use X\Sys\Session;

	class Core{
		//Sempre necessita 3 parametres
		static private $controller;
		static private $action;
		static private $params;

		public static function init(){
			//Cridem a la funcio exploding -> convertir l'string en diferents parametres (array)
			Session::init();
			Request::exploding();
			//$arrayquery preparat per extreure el controlador
			self::$controller=Request::getVariable();
			//echo self::$controller.'<br>';
			self::$action=Request::getVariable();
			//echo self::$action.'<br>';
			self::$params=Request::getParams();
			//var_dump(self::$params);

			//Fer routing

			self::router();
		}

		/**
		* router: It looks for controller and action
		*
		*
		*
		*/
		static function router(){
			//si no hi ha controller busquem 'home'
			$cont=(self::$controller !="")?self::$controller:'home'; 
			$acc=(self::$action !="")?self::$action:'home';
			
			//trobar controladors (passar a minuscules i afegir extensio .php)
			$filename=strtolower($cont).'.php'; 
			//echo $filename;
			//Comprobar si existieix o no
			$fileroute=APP.'controllers'.DS.$filename;
			//echo $fileroute;
			if(is_readable($fileroute)){
				$contr_Class='\X\App\Controllers\\'.ucfirst($cont); //ucfirst -> primera lletra en majúscula
				//echo $contr_Class;
				//fem una instancia d'una clase on li passem parametres a través del constructor
				self::$controller=new $contr_Class(self::$params);
				//cal cridar ara l'acció
				//veure si la accio esta definida dintre de la class
				if(is_callable(array(self::$controller,$acc))){
					//cridar a la funcio d'usuari
					call_user_func(array(self::$controller,$acc));
				}
				else{
					echo $action.': Mètode inexistent';
				}
			}else{
				echo $cont.': Controlador inexistent';
			}
		}
	}