<?php
	namespace X\App\Controllers;

	use X\Sys\Controller;

	class Users extends Controller{
		/*protected $model;
		protected $view;
		protected $params;*/

		public function __construct($params){
			//parent seria com super a java
			parent::__construct($params);
			//array que li passem perque es puguin carregar les 
			//variables de tpl i home.php
			$this->dataView=array('name'=>'Mire',
						'title'=>'Users');
			$this->model=new \X\App\Models\mUsers();
			$this->view=new \X\App\Views\vUsers($this->dataView);
		}

		function home(){
			//echo 'USERRR!!';
		}
	}