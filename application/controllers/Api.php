<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

//fuction to get the initial categories
public function getCategory(){
    $category=$this->Song_model->getCategories();
    $categories['categories']=$category;
    echo json_encode($categories);
}

// function to get te albums
public function getAlbums($start,$stop){
	$currentAlbums['albums']=$this->Song_model->getAlbumsIn($start,$stop);
	echo json_encode($currentAlbums);
}
/*
The following are function to get the category of songs

*/

public function getSong($category,$start,$stop,$type){
    $songs['cat']=$this->Song_model->getSongs($stop,$start,$category,$type);
    echo json_encode($songs);
}


  //function  to get the playlist
public function getPlaylist($phone){
    $result['songs']=$this->Song_model->playlist($phone);
    echo json_encode($result);

}

}
?>