<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Auth_model extends CI_Model{


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

			 $data = array(
		 	 'phone'=>$phone,
		 	 'password'=>md5($password));

		     $this->db->insert('users',$data);

		    return json_encode("success");

		}else{
			return  json_encode( "Phone registered");
		}
	}

	

}
?>