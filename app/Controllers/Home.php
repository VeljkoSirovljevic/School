<?php
namespace App\Controllers;

use App\Classes\Controller;
use App\Models\StudentModel;

class Home extends Controller{

	protected function Index(){
		$viewModel = new StudentModel();
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

		switch($student['board']){
			case 'csm' :
				echo $this->csmStudent($student);
				break;
			case 'csmb' :
				echo $this->csmbStudent($student);
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

	private function csmbStudent($student) {
		$gradeArr = [];
		$result = [];
		if($student['grade1'] > 0){ $gradeArr[] = $student['grade1']; }
		if($student['grade2'] > 0){ $gradeArr[] = $student['grade2']; }
		if($student['grade3'] > 0){ $gradeArr[] = $student['grade3']; }
		if($student['grade4'] > 0){ $gradeArr[] = $student['grade4']; }

		if (count($gradeArr) > 1) {
			sort($gradeArr);
			array_shift($gradeArr);
		}

		$average =  array_sum($gradeArr) / count($gradeArr);

		$pass= 'Fail';

		if (max($gradeArr) > 8) { $pass = 'Pass';}

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
		header("Content-type: text/xml");
		return $this->arrayToXml($result);

	}

	private function arrayToXml($array, $rootElement = null, $xml = null) {
		$_xml = $xml;

		// If there is no Root Element then insert root
		if ($_xml === null) {
			$_xml = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
		}

		// Visit all key value pair
		foreach ($array as $k => $v) {

			// If there is nested array then
			if (is_array($v)) {

				// Call function for nested array
				$this->arrayToXml($v, $k, $_xml->addChild($k));
			}

			else {

				// Simply add child element.
				$_xml->addChild($k, $v);
			}
		}

		return $_xml->asXML();
	}

}