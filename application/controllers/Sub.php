<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Sub extends CI_Controller {


//function for subscription
	public function index()
	{

	
	}


	public function calling(){

			//taking the phone number, password,songid, $price;

		if(isset($_POST['phone'],$_POST['password'],$_POST['songid'],$_POST['price'])){

			$songid=$_POST['songid'];
			$price=$_POST['price']; $phone=$_POST['phone']; $password=$_POST['password'];
			
			$this->subscribe($songid,$price,$phone,$password);
			
	   }else{
	  
	   
	   }
	}

	private function subscribe($songid,$price,$phone,$password){

		$result=$this->Auth_model->get_user($phone,$password);
		
		//if the result is  not null
		
		if($result===null){
			//
			
			echo "not authorised";


		}{

			$result=$this->Sb->deductbalance($songid,$price,$phone);
		}
	}

	//function to check for balance

	public function checkBalance($phone){
		if($phone!==null){
				$result=$this->Sb->Balance($phone);
				echo $result;
	    }
    }
	

}


						