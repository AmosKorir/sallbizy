<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Sb extends CI_model{


	public function addBalance($new_amount,$phone){
		$this->db->select('amount');
		$this->db->where('balanceaccount',array('phone' => $phone, ));


		$current_amount=0;

		$account_row=$this->db-get();
		foreach ($account_row as $row) {
			$current_amount=$row['amount'];
	    }
	    	//add both the amounts

		$new_amount+=$current_amount;

		//update the amount
		$data = array('amount' =>$new_amount);
		 $this->db->where('phone',$phone);
		 $this->db->update('balanceaccount',$data);


     }

     public function  deductbalance($songid,$deduct_amount,$phone){
     	
     		$this->db->select('amount');
		    //$this->db->where('balanceaccount',array('phone' =>$phone));

		    $account_row=$this->db->get_where('balanceaccount', array('phone' =>$phone));
			
		     $current_amount=0;
		     	$row=$account_row->result_array();
		
				foreach ($row as $row) {
					$current_amount=$row['amount'];

				}

		//add both the amounts
				// echo "<br/>string";
				// echo $current_amount;

			//test if already bought the song
			$status=$this->checkPlay($phone,$songid);
				
				$st=$status;
			if ($st>0) {
				
					 echo "already";
			}else{
				

				if($current_amount>=$deduct_amount){
					
				  $current_amount-=$deduct_amount;



				
				//update the amount
				$data = array('amount' =>$current_amount);
				 $this->db->where('phone',$phone);
				 $this->db->update('balanceaccount',$data);
				 // echo "amount updated";
				 $this->insertPlay($phone,$songid);
				 echo "successfull";

				}else{
					echo "less";
				}
			}
	
     }

     public function checkPlay($phone,$songid){

     	$row=$this->db->get_where('playlist', array('phone' =>$phone,'songid'=>$songid));
     	$row=$row->result_array();
     	$num=sizeof($row);
     		return $num;

     }

     private function insertPlay($phone,$songid){
     		
     		$data= array('phone' =>$phone ,'songid'=>$songid );
     		$this->db->insert('playlist',$data);
     }

     //function to check balance

     public function Balance($phone){
     	$row=$this->db->get_where('balanceaccount',array('phone'=>$phone));
     	$row=$row->result_array();
     	$balance="";

     	foreach($row as $r){
     		$balance=$r['amount'];
     	}

     	return $balance;


     }
} ?>