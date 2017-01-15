<?php
	namespace X\App\Controllers;

	use X\Sys\Controller;

	class Home extends Controller{
		/*protected $model;
		protected $view;
		protected $params;*/

		public function __construct($params){
			//parent seria com super a java
			parent::__construct($params);
			//array que li passem perque es puguin carregar les 
			//variables de tpl i home.php
			$this->dataView=array('name'=>'Mire',
						'title'=>'HOME');
			$this->model=new \X\App\Models\mHome();
			$this->view=new \X\App\Views\vHome($this->dataView);
		}

		function home(){
			//echo 'HOMEEE!!';
			//$this->view->name='Mire';
		}
	}