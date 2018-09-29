<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Sub extends CI_Controller {

//function to check for the subscription
public function checkme($phone){

	$status=$this->Sb->check_validity($phone);
	echo json_encode($status);
}

//check my subscription
public function checksubscription($phone){
	$subscription=$this->Sb->get_subscription($phone);
	echo json_encode($subscription);
}


}


						