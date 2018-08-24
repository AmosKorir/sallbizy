<?php
//defined('BASEPATH')OR exit('No direct script access allowed');
  class Admin extends CI_Controller{
    public function index(){
     $this-> isLogined();
     $match=$this->input->post('search');
    	 $album['albums']=$this->Admin_model->getAlbums($match);
    	 $this->load->view('header');
       $this->load->view('sell.php',$album);
    }



    //function to test if the user is logined 

    public function isLogined(){
        if(empty($this->session->userdata('userid') )){
        redirect("AdminLogin");
      }
    }

    //function to search for the album

    public function search(){
       $this-> isLogined();
      if(empty($this->session->userdata('userid') )){
        redirect("AdminLogin");
      }
    	 $this->form_validation->set_rules('search','search','required');
    	 $this->form_validation->run();
    	 $match=$this->input->post('search');
    	 $album['albums']=$this->Admin_model->getAlbums($match);
    	 $this->load->view('header');
         $this->load->view('sell.php',$album);
    }




    //function to insert the song

    public function insertSong(){
       $this-> isLogined();


    	$this->form_validation->set_rules('id','Album','required');
    	$this->form_validation->set_rules('category','Category','required');
    	$this->form_validation->set_rules('songprice','Price','required');
    	$this->form_validation->set_rules('songtitle','Song title','required');

    	if($this->form_validation->run()===false){
    			 $match=$this->input->post('search');
    	         $album['albums']=$this->Admin_model->getAlbums($match);
    	         $this->load->view('header');
    	         $this->load->view('sell.php',$album);

    	}
    	else{


    		 $filename=time();
              $config = array(
              'upload_path' => './resources/songs',
              'allowed_types' => "mkv|wmv|mp4|avi|mov|mp4|video/mp4|jpg",
              'overwrite' => TRUE,
              'file_ext'  => ".jpg",
              'max_size' => "10000000000000000000",
             'file_name' => $filename
        );
        $this->load->library('upload', $config);

          if (!$this->upload->do_upload('userfile')) {

            $errors = array('error' =>$this->upload->display_errors() );
            print_r($errors);
                 $post_image='noimage.jpg';
                 $match=$this->input->post('search');
    	         $album['albums']=$this->Admin_model->getAlbums($match);
               $this->load->view('header');
    	         $this->load->view('sell.php',$album);

            
          }else{
            // rename the uploaded
          
            $data= array('upload_data' =>$this->upload->data());
           
            $post_image=$data['upload_data']['file_name'];
            $this->Song_model->create_item($post_image);

                 $match=$this->input->post('search');
    	           $album['albums']=$this->Admin_model->getAlbums($match);
    	          $this->load->view('header');
    	          $this->load->view('sell.php',$album);


          }


     	}

     
      


    }
    /* working with deletion from here

    all the function below
    */





     //function to delete album
          public function deleteAlbum(){
             $this-> isLogined();
             $result['album']=$this->Song_model->getAlbumsIn(100,0);
             $this->load->view('header');
             $this->load->view('deletealbum',$result);
          }

    //function to delete songs
           public function deleteSong(){
             $this-> isLogined();
             if(isset($_POST['search'])){

               $result['songs']=$this->Song_model->Search("K");
               
             }else{
                 $result['songs']=$this->Song_model->Search("");
                 
             }
            
            $this->load->view('header');
            $this->load->view("deletesong",$result);
          }

    //function to delete artist
      public function deleteArtist(){
            $this-> isLogined();
            $result['artist']=$this->Song_model->getArtist(100,0);
            $this->load->view('header');
            $this->load->view('deleteArtist',$result);
      }



      //delete function
      public function artistDelete($id){
         $this-> isLogined();
           
           $this->Admin_model->artistdelete($id);
            $result['artist']=$this->Song_model->getArtist(100,0);
            $this->load->view('header');
            $this->load->view('deleteArtist',$result);

      }

      public function albumDelete($id){
         $this-> isLogined();
           
           $this->Admin_model->albumdelete($id);
             $result['album']=$this->Song_model->getAlbumsIn(100,0);
             $this->load->view('header');
             $this->load->view('deletealbum',$result);
      }

        //function search

      public function  songDelete($id){
         $this-> isLogined();
              $this->Admin_model->songdelete($id);
            $result['songs']=$this->Song_model->Search($id);
            $this->load->view('header');
            $this->load->view("deletesong",$result);
      }
 

  }

 