<?php
class ApiService {
	public $parameters = [];
	public $error = [];
	public $method_parameters = [];
	
	function __construct(){
		$this->parameters = $_REQUEST;
		
		if($this->checkQuery()) {
			$this->connectModelFile();
			$this->checkModelFile();	
		}
	}
	
	function checkQuery() {
		if(!isset($this->parameters['model'])) {
			$this->error[]='please model parameter';
			return false;
		}
		if(!isset($this->parameters['method'])) {
			$this->error[]='please method parameter';
			return false;
		}
		return true;
	}
	
	function connectModelFile() {
		$file_name = $this->parameters['model'].'.php';
		if(file_exists($file_name)){
			require($file_name);	
		}
		else {
			$this->error[]='please cleate file '.$file_name;
		}
	}
	function checkModelFile() {
		if(!class_exists($this->parameters['model'])){
			$this->error[]='please cleate class '.$this->parameters['model'].' in '.$this->parameters['model'].'.php';
		}
		if(!method_exists($this->parameters['model'], $this->parameters['method'])){
			$this->error[]='please cleate method '.$this->parameters['method'].' in class'.$this->parameters['model'];
		}
	}
	
	function readQuery() {
		if(!empty($this->error)) {
			$this->result = $this->error;
		}
		else {
			$run_api = new $this->parameters['model'];
			$run_method = $this->parameters['method'];
			$this->result = $run_api->{$run_method}($this->parameters['method_parameters']);
		}
		$this->sendResponce($this->result);
	}
	
	function sendResponce() {
		echo json_encode($this->result);
	}
}