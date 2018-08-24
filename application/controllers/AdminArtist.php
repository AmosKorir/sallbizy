<?php

	class AdminArtist extends CI_Controller{
    public function index(){
    
     $this->load->view('header');
     $this->load->view('addartist.php');
    }




    //function to add new artist

    public function insertArtist(){
       	  $this->form_validation->set_rules('artistname','Artist name','required');
                

          if($this->form_validation->run()===FALSE){
              $this->load->view('header');
             $artist['artist']=$this->Admin_model->getArtists('');
             $this->load->view('addalbum.php',$artist);
           }else{


           		 // generate file name using timestamp;
        
          $filename=time();
           $config = array(
              'upload_path' => './resources/artist',
              'allowed_types' => "gif|jpg|png|jpeg",
              'overwrite' => TRUE,
              'file_ext'  => ".jpg",
              'max_size' => "2048000",
              'max_height' => "0",
              'min_height'=>'0',
              'min_widht'=>'0',
              'max_width' => "0",
              'file_name' => $filename
        );
        $this->load->library('upload', $config);

          if (!$this->upload->do_upload('userfile')) {

            $errors = array('error' =>$this->upload->display_errors() );

            $post_image='noimage.jpg';
            
          }else{
            // rename the uploaded
          
            $data= array('upload_data' =>$this->upload->data());
           
            $post_image=$data['upload_data']['file_name'];
          }
          	$name=$this->input->post('artistname');

            $this->Admin_model->insertArtist($post_image,$name);
            $this->load->view('header');
            $artist['artist']=$this->Admin_model->getArtists('');
            $this->load->view('addartist.php',$artist);
     }
    }
  }

?>