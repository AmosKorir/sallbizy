<?php
  class AdminAdvert extends CI_Controller{
    public function index(){
    
     $this->load->view('header');

      //get the list of artist

      $artist['artist']=$this->Admin_model->getArtists('');
      $this->load->view('addaadvert.php',$artist);
    }

    
    
      

}

?>