<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {



// function to get te albums
public function getAlbums($start,$stop){
	$currentAlbums['albums']=$this->Song_model->getAlbumsIn($start,$stop);
	echo json_encode($currentAlbums);
}
/*
The following are function to get the category of songs

*/

public function getSong($category,$start,$stop){
    $songs['cat']=$this->Song_model->getSongs($start,$stop,$category);
    echo json_encode($songs);
}


  //function  to get the playlist
public function getPlaylist($phone){
    $result['songs']=$this->Song_model->playlist($phone);
    echo json_encode($result);

}

//function to get the top ranking songs

public function getTopSongs(){
    $result=$this->Song_model->topSongs();
    $currentSongs['songs']=$result;
    echo json_encode($currentSongs);
}


}
?>