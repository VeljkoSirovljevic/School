<?php
namespace App\Controllers;

use App\Classes\Controller;
use App\Models\HomeModel;
use App\Models\StudentModel;

class Home extends Controller{

	protected function Index(){

		if (isset($_GET['student'])) {
			echo '123';die;
		}

		$viewModel = new HomeModel();
		$this->returnView($viewModel->index(),true);
	}

	public function addStudent(){
		$viewmodel = new StudentModel();
		$this->returnView($viewmodel->add(), true);
	}

	public function student() {
		$uri = $_SERVER['REQUEST_URI'];
		$arr = explode('/',$uri);
		$id = end($arr);

		$result = $this->prepareResult($id);
	}

	private function prepareResult($id){
		$viewmodel = new StudentModel();
		$student = $viewmodel->getStudent($id);

		//var_dump($student);die;
		switch($student['board']){
			case 'csm' :
				echo $this->csmStudent($student);
				break;
			case 'csmb' :
				$result = $this->csmbStudent($student);
				break;
		}

	}

	private function csmStudent($student) {
		$gradeArr = [];
		$result = [];
			if($student['grade1'] > 0){ $gradeArr[] = $student['grade1']; }
			if($student['grade2'] > 0){ $gradeArr[] = $student['grade2']; }
			if($student['grade3'] > 0){ $gradeArr[] = $student['grade3']; }
			if($student['grade4'] > 0){ $gradeArr[] = $student['grade4']; }

		$average = array_sum($gradeArr) / count($gradeArr);
		$pass = 'Fail';
		if($average >= 7) { $pass = 'Pass'; };

		$result['id'] = $student['id'];
		$result['name'] = $student['name'];
		if($student['grade1'] > 0) {
			$result['grade1'] = $student['grade1'];
		}
		if($student['grade2'] > 0) {
			$result['grade2'] = $student['grade2'];
		}
		if($student['grade3'] > 0) {
			$result['grade3'] = $student['grade3'];
		}
		if($student['grade4'] > 0) {
			$result['grade4'] = $student['grade4'];
		}
		$result['average'] = $average;
		$result['final_result'] = $pass;

		return json_encode($result);
	}
}