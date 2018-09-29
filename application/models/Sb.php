<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Sb extends CI_model{

//function get the suscription
public function get_subscription($phone){
	$this->db->select('*');
	$this->db->where('phone',$phone);
	$this->db->from('subscription');
	$result=$this->db->get();
	$result=$result->result_array();
	return $result[0];
}

// function to test whether the user is still valid for playing 

public function check_validity($phone){
	$result=$this->get_subscription($phone);

	foreach ($result as $row) {
		$stopdate=$row['stop'];
	}

	$today=date("Y-m-d");
	
	if($today<=$stopdate){
		return "true";
	}else{
		return"false";
	}
}


} ?>