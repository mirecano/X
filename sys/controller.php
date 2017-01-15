<?php
	namespace X\Sys;

	use X\Sys\Registry;

/**
	* Controller: the base controller
	*	in MVC systems
	*
	* @author: Mire
	* @package: sys
	*
	**/

	class Controller{
		protected $model;
		protected $view;
		protected $params;
		protected $dataView;
		protected $conf;

		function __construct($params, $dataView=null){
			//fer seus els parametres
			$this->dataView=$dataView;
			$this->params=$params;
			//Acces tipus Singleton
			$this->conf=Registry::getInstance();
			//var_dump($this->conf);
		}
		//resposta ajax del controlador
		function ajax($output){
			//netejar buffer de sortida
			ob_clean();
			if(is_array($output)){
				echo json_encode($output);
			}
		}

	}