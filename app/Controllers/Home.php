<?php
namespace App\Controllers;

use App\Classes\Controller;
use App\Models\HomeModel;

class Home extends Controller{

	protected function Index(){
		$viewModel = new HomeModel();
		$this->returnView($viewModel->index(),true);
	}

	public function addStudent(){
		var_dump($_POST);die;
	}
}