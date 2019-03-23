<?php
namespace App\Classes;

abstract class Controller{
	protected $request;
	protected $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction(){
		$a = $this->action;
		return $this->$a();
	}

	protected function returnView($viewmodel, $fullview){
		$className = (new \ReflectionClass($this))->getShortName();

		$view = 'views/'. $className. '/' . $this->action. '.php';
		if($fullview){
			require('views/main.php');
		} else {
			require($view);
		}
	}
}