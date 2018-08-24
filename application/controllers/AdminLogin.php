<?php
class AdminLogin extends CI_Controller{
    public function index(){
   
     $this->load->view('login');
    }

    //function to login

    public function login(){
    	if(isset($_POST['password'])){
    		$result=$this->Admin_model->loggin($this->input->post('password'));
    		if ($result>0){    			
    		    $this->session->set_userdata("userid","yes");
    		     redirect('Admin');
    		}else{
    			 redirect('AdminLogin');
    		}
    		

    	}
    }

     // function to logout
    public function logout(){
      $this->session->unset_userdata('userid');
      redirect('AdminLogin');
      
    }
  }
?>