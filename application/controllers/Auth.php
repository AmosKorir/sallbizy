<?php
defined('BASEPATH')OR exit('No direct script access allowed');
  class Auth extends CI_Controller{

    public function index(){
       echo"please login";
    }

    //function to create the user

    public function createUser($phone,$password){    
    		$message=$this->Auth_model->insert_user($password,$phone);
            if($message=="sucessfull"){
               echo json_encode("sucessfull");
           }else{
                echo json_encode("unsucessfull");
           } 
         
    }
   

}
?>