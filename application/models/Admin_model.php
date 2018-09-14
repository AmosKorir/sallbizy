<?php
defined('BASEPATH')OR exit('No direct script access allowed');
require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
class Admin_model extends CI_Model{
private $SECRET_KEY='D+qSnD8t4kAFdUA3nLFKs83Rpp4pz7GUW32lScb6';
private $KEY='AKIAIVBE7O7I3JXPBP2Q';
private function initS3(){
//instantiate amazon s3 client
$s3=new S3Client([
	'version'=>'latest',
	'region'=>'us-west-2',
	'credentials'=>[
		'key'=>$this->KEY,
		'secret'=>$this->SECRET_KEY
	]
]);
return $s3;
}

//function to create packets in s3
public function createBacket($name){
	$client=$this->initS3();
	try{
		$result=$client->createBucket(
			[
				'Bucket'=>$name
				
			]
			);
	} catch(Exception $e){
			echo "error occured";
	}

}

//function to upload a file to s3 databasee

public function uploadFile($file,$filename,$backectName){
	$client=$this->initS3();
	try{
		$result=$client->putObject(
			[
				'Bucket'=>$backectName,
				'Key'=>$filename,
				'SourceFile'=>$file
			]
			);
	}catch(Exception $e){
		echo"there was was an error".$e;
	}
}


//function to get access to a video file
public function getVideoUrl(){
	
}

















































	////////////////////////////////////////////////////////////////////////
	//function to insert the artist

	public function insertArtist($image,$name){
		 $data = array('artistid' =>'',
		 	 'name'=>$name,
		 	 'image'=>$image,
		 	 'sound'=>Metaphone($name));
		 $this->db->insert('artist',$data);

	}

	private function createMetaphone($name){
		return metaphone($name);
			}


	//fuction get all the artists by search and all

	public function getArtists($match){
		$newmatch=metaphone($match);
		$this->db->select();
		$this->db->from('artist');
		$this->db->like('sound',$newmatch);
		$result=$this->db->get();

		return $result->result_array();
	}



	/* below function deals with the album files


	*/

	public function insertAlbum($post_image){

		$artistid=$this->input->post('id');
		$albumname=$this->input->post('albumname');
		$sound=metaphone($albumname);

		$data= array('albumid' =>"" ,
					'name'=>$albumname,
					'image'=>$post_image,
					'artistid'=>$artistid,
					'sound'=>$sound);

		$this->db->insert("albums",$data);

	}


	//function to get the albums
	public function getAlbums($match){
		$newmatch=metaphone($match);
		$this->db->select();
		$this->db->from('albums');
		$this->db->like('sound',$newmatch);
		$result=$this->db->get();

		return $result->result_array();
	}



	//function to login admin
	public function loggin($password){
		//$password=md5($password);
		$result=$this->db->get_where('admin', array('me' =>$password));

		$result=$result->result_array();
		return sizeof($result);


	}

	public function deleter($table,$where){
	$this->db->select();
	$this->db->from($table);
    $this->db->where($where);
    $result=$this->db->get();
    $result=$result->result_array();

    $image;
    foreach ($result as  $row) {
      if($table==="artist"){
        $image=$row['artistid'];
      }


      	$path = './resources/artist/'.$gambar;
        unlink($path);
       $this->db->where($where);
       $this->db->delete($table);
      // if($table==="artist"){
      //  $image=$row[''];
      // }
      // if($table==="artist"){
      //  $image=$row[''];
      // }
      
    }
}

//function to delete song
	
	public function songdelete($id){
		//select a single element first and get the image
        $query=$this->db->get_where('songs', array('songid' =>$id , ));
        $item=$query->row_array();
        $image=$item['vedio'];

        $gambar= $image;
        $path = './resources/songs/'.$gambar;
        unlink($path);

       $this->db->where('songid',$id);
       $this->db->delete('songs');

	}



	public function artistdelete($id){
		//select a single element first and get the image
        $query=$this->db->get_where('artist', array('artistid' =>$id , ));
        $item=$query->row_array();
        $image=$item['image'];
        $gambar= $image;

        $path = './resources/artist/'.$gambar;
        if($image==="noimage.jpg"){

        }else{
        	 unlink($path);
        }
       
        $this->db->where('artistid',$id);
        $this->db->delete('artist');
	}


	public function albumdelete($id){
		       
        $this->db->where('albumid',$id);
        $this->db->delete('albums');
	}

	





}

?>