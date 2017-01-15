<?php
	namespace X\App\Views;

	use \X\Sys\View;

	class vUsers extends View{

		public function __construct($dataView=null){
			parent::__construct($dataView);
			$this->template='tusers.php';
			$html=$this->render($this->template);
			echo $html;

		}
	}