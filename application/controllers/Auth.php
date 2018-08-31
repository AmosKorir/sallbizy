<?php
defined('BASEPATH')OR exit('No direct script access allowed');
  class Auth extends CI_Controller{

    public function index(){
       
    }

    //function to create the user

    public function createUser(){
    	if(isset($_POST['phone'],$_POST['password'])){
    		$message=$this->Auth_model->insert_user($_POST['password'],$_POST['phone']);
            echo json_encode($message);
            if($message=="sucessfull"){
               echo "sucessfull";
           }else{
                echo "unsucessfull";
           }
    		
    	}else{
    		echo "Error";
    	}

       
    }

    //function to login the user

    public function login($phone,$password){
    	
    		$message=$this->Auth_model->get_user($phone,$password);
            if($message===null){
               $message="unsucessfull";
            }else{
                 $message="sucessfull";
            }
    		echo ($message);
    	
    }

    //fuction to activate the account

    public function AccountActivation(){
    	if(isset($_POST['phone'],$_POST['code'])){
    		$this->Auth_model->activate($_POST['code'],$_POST['phone']);
    		
    	}else{
    		echo "Error!";
    	}
    }

}
?>