<?php
	namespace X\Sys;

	/**
	* View: extend un obj q ja existeix en la llibreria extandar de php (arrayObject) 
	*	
	* @author: Mire
	* @package: sys
	*
	**/

	class View extends \ArrayObject{ //ArrayObject ve de llibreria standard de php, per aixó utilitzem \
		
		protected $template;
		protected $data=array();

		public function __construct($dataView){
			//ens permet accedir al array de vista de forma q totes les variables
			//es poden accedir mitjançant $this
			
				parent::__construct($dataView, \ArrayObject::ARRAY_AS_PROPS);			

		}

		//Agafem el directori de templates per poder renderitzar-los. 

		public function render($template){
			ob_start();
			include APP.'tpl'.DS.$template;
			return ob_get_clean(); //no funciona si no possem al davant ob_start()
		}
	}