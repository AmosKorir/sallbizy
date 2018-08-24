<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->getSongs();
	}
  // function to get songslist
  public function getSongs(){
	$currentSongs['songs']=$this->Song_model-> getLastest();
	echo json_encode($currentSongs);

}

    // function to get te albums
    public function getAlbums(){
      $currentAlbums['albums']=$this->Song_model->getAlbumsIn(20,0);
      echo json_encode($currentAlbums);
    }

// function to get the album songs
public function getAlbumSongs($album){
  $currentSongs['songs']=$this->Song_model-> getAlbumsongsIn($album);
	echo json_encode($currentSongs);
}


// function to get the video
public function create(){
    $this->form_validation->set_rules('songtitle','Title','required');
    $this->form_validation->set_rules('songprice','Price','required');
    $this->form_validation->set_rules('productdesc','Description','required');
    $this->form_validation->set_rules('songcategory','Category','required');
	   $this->form_validation->set_rules('album','Album','required');
    if($this->form_validation->run()===FALSE){
      $this->load->view('header');
      $this->load->view('sell');
    }
    else {
        //upload image
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
        // $this->song_model->create_item($post_image);
        // run the method to upload the video
        $this->uploadVideo($post_image);
        }
      }


      // function to upload a video
      public function  uploadVideo($post_image){
          // generate file name using timestamp;
         $filename=time();
         $config = array(
            'upload_path' => './resources/images',
            'allowed_types' => "wmv|mp4|avi|mov",
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
        if (!$this->upload->do_upload('myuserfile')) {
          $errors = array('error' =>$this->upload->display_errors() );
          $post_video='noimage.jpg';
      
        }else{
          // rename the uploaded
         $data= array('upload_data' =>$this->upload->data());
         $post_video=$data['upload_data']['file_name'];
        }    
        
       $data= array('imageuri'=>$post_image,'videouri'=>$post_video);
        $this->song_model->create_item($data);
        // $this->load->view('header');
        // $this->load->view('sell');
      }

// get music cateegory 


      public function getGenre($genre){
        $songs=$this->Song_model->getSongs(10,0,$genre);
        
       return $songs;
      }

      // function get  all the categories

      public function getAllCategory(){
        $gospel=$this->getGenre("gospel");
        $orutu=$this->getGenre("orutu");
        $onanda=$this->getGenre("onanda");
        $Genge=$this->getGenre("genge");
        $ohangla=$this->getGenre("ohangla");
        $Bongo=$this->getGenre("bongo");
        $nyatiti=$this->getGenre("nyatiti");
        $afro=$this->getGenre("afrofussion");
        $benga=$this->getGenre("benga");
        $ohangla=$this->getGenre("ohangla");
        $rhumba=$this->getGenre("rhumba");

        $categories['adverts']=$this->Song_model->getAdverts();
        $categories['gospel']=$gospel;
        $categories['orutu']=$orutu;
        $categories['onanda']=$onanda;
        $categories['genge']=$Genge;
        $categories['nyatiti']=$nyatiti;
        $categories['bongo']=$Bongo;
        $categories['afrofussion']=$afro;
        $categories['benga']=$benga;
        $categories['rhumba']=$rhumba;
        $categories['ohangla']=$ohangla;       
          
         echo json_encode($categories);
      }

      // function to get the artists
      public function getArtist(){
        $artist['artist']=$this->Song_model->getArtist(30,0);
        echo json_encode($artist);
      }

      // function to get the songs of an artist
      public function getArtistSongs($id){
        $currentSongs['songs']=$this->Song_model-> getArtistsongsIn($id);
        echo json_encode($currentSongs);
      }

      //function to get the adverts
      public function getAdverts(){
        $currentAdverts['adverts']=$this->Song_model-> getAdverts();
        echo json_encode($currentAdverts);
      }
      // pagination function 
      public function getPagination(){
          $config['base_url'] = 'http://localhost/isong/Welcome/getPagination';
          $config['total_rows'] = $this->db->get('songs')->num_rows();
          $config['per_page'] = 1;
         

          $this->pagination->initialize($config);
                
   

       $records=$this->db->get('songs');
       $data['records']=$records->result_array();
     

    echo json_encode( $records->result_array());
      }


      //get the test

      public function s(){
        $config['base_url'] = 'http://localhost/isong/Welcome/getPagination';
          $config['total_rows'] = 50;
          $config['per_page'] = 10;
          $config['uri_segment']=3;
           $this->pagination->initialize($config);

           $page=($this->uri->segment(3))? $this->uri->segment(3):0;

       $currentSongs['songs']=$this->Song_model-> getSongs($config['per_page'],$page,'Regae');
        echo json_encode($currentSongs);
    }


// function for searching

    public function search(){
      if(isset($_POST['search'])){
          $result['search']=$this->Song_model->Search($_POST['search']);
         // $resulti=$this->Song_model->createSound("11");
       
        echo json_encode($result);
      

      }
    }


    //function to check playlist

    public function checkPlay(){
      if (isset($_POST['phone'],$_POST['songid'])) {
        $num=$this->Sb->checkPlay($_POST['phone'],$_POST['songid']);

        $st=$num;
        if($st>0){
          echo json_encode('yes');
        }
        else{
          echo json_encode('no');
        }
      }

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



    //the following are methods to get each category genre
    public function genge(){
           $songs['cat']=$this->Song_model->getSongs(50,0,"genge");
           echo json_encode($songs);
    }

       public function gospel(){
            $songs['cat']=$this->Song_model->getSongs(50,0,"gospel");
           echo json_encode($songs);
    }

 public function ohangla(){
            $songs['cat']=$this->Song_model->getSongs(50,0,"ohangla");
           echo json_encode($songs);
    }

 public function bongo(){
           $songs['cat']=$this->Song_model->getSongs(50,0,"bongo");
            echo json_encode($songs);
    }

 public function afrofussion(){
           $songs['cat']=$this->Song_model->getSongs(50,0,"afrofussion");
            echo json_encode($songs);
    }

 public function onanda(){
            $songs['cat']=$this->Song_model->getSongs(50,0,"onanda");
           echo json_encode($songs);
    }
     public function orutu(){
            $songs['cat']=$this->Song_model->getSongs(50,0,"orutu");
           echo json_encode($songs);
    }
     public function nyatiti(){
            $songs['cat']=$this->Song_model->getSongs(50,0,"nyatiti");
           echo json_encode($songs);
    }

     public function rhumba(){
            $songs['cat']=$this->Song_model->getSongs(50,0,"rhumba");
      echo json_encode($songs);
    }
     public function benga(){
           $songs['cat']=$this->Song_model->getSongs(50,0,"benga");
            echo json_encode($songs);
    }

    public function audio(){
         $songs['audio']=$this->Song_model->getAudio(50,0);
            echo json_encode($songs);
    }



   }