<?php
	namespace X\App\Views;

	use \X\Sys\View;

	class vHome extends View{

		function __construct($data=null){
			parent::__construct($data);
			$this->template='thome.php';			
			$html=$this->render($this->template);
			echo $html;

		}
	}