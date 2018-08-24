<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Auth_model extends CI_Model{


	//function to authenicate
	public function get_user($phone,$password){
		     
		     $pwd=md5($password);

		 $query = $this->db->get_where('users', array('phone' =>$phone,'password'=>
		 	$pwd));
		   
		    $id="";
		    	$row=$query->result_array();

		    	
		    foreach ($row as $row) {
		    		$userid=$row['userid'];
		    		$status=$row['status'];

		 			
		 			$result['userid']=$userid;
		 			$result['status']=$status;


		 			return $result;
		    }
     		 
	}
	//function find user id
	public function user_exist($phone){
		$query = $this->db->get_where('users', array('phone' =>$phone));
     
     		 return $query->result_array();
	}
	//function create the user
	public function insert_user($password,$phone){

		$users=$this->user_exist($phone);
		
		$num=sizeof($users);
		
		if($num===0){

			 $data = array('userid' =>'',
		 	 'confirmationcode'=>rand(1000,9999),
		 	 'status'=>"noactive",
		 	 'phone'=>$phone,
		 	 'password'=>md5($password));

		     $this->db->insert('users',$data);

		      return "success";

		}else{
			return "Phone registered";
		}
	}




	

	//function to activate the account

	public function activate($code,$phone){

			$user=$this->user_exist($phone);
			$codeuser;
			foreach ($user as $row) {
				$codeuser=$row['confirmationcode'];

					if ($code===$codeuser) {
			

				     $data = array('status' =>'active');
		             $this->db->where('phone',$phone);
		             $this->db->update('users',$data);
		            
					}
					else{
						echo "not";
					}
			}

			
	}
}
?>