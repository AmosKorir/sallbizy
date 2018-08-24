<?php
	class AdminAlbum extends CI_Controller{
    public function index(){
    
     $this->load->view('header');

      //get the list of artist

      $artist['artist']=$this->Admin_model->getArtists('');
      $this->load->view('addalbum.php',$artist);
    }


    //function to search for the artist

    public function search(){
    	 $this->form_validation->set_rules('search','search','required');
    	 $this->form_validation->run();
    	 $match=$this->input->post('search');
    	 $artist['artist']=$this->Admin_model->getArtists($match);
    	 $this->load->view('header');
       $this->load->view('addalbum.php',$artist);
    }


    //function to insert an album


    

    public function insertAlbum(){
    	  $this->form_validation->set_rules('id','Artist','required');
          $this->form_validation->set_rules('albumname','Album name','required');
         

          if($this->form_validation->run()===FALSE){
              $this->load->view('header');
             $artist['artist']=$this->Admin_model->getArtists('');
             $this->load->view('addalbum.php',$artist);
           }else{


           		 // generate file name using timestamp;
        
          $filename=time();
           $config = array(
              'upload_path' => './resources/images',
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
             $this->Admin_model->insertAlbum($post_image);
            $this->load->view('header');
            $artist['artist']=$this->Admin_model->getArtists('');
            $this->load->view('addalbum.php',$artist);
     }
    }

}

?>