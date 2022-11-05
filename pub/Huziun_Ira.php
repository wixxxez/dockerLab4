<?php
class Huziun_Ira {
	function __construct(){
	}
	
	function myName($method_parameters=[]){
		$result['method_parameters'] = $method_parameters;
		$result['result'] = array(
			'result' => "Husjun Ira"
		);
		
		return $result;
	}
	
	function getContact($method_parameters=[]){
		$result['method_parameters'] = $method_parameters;
		$result['reult']=array(
            'result'=>"email@email.email");
		return $result;
	}
}