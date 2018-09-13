<?php 
// require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\CloudFront\CloudFrontClient;
class Song_model extends CI_model{
    //get one solid of categorised data
    public function getSolid($type){
      $category=$this->getCategories();
      $count=0;
      foreach($category as $cate){
        $songs["categoryname"]=$cate["category"];
        $songs["songs"]=$this->getSongs(50,0,$cate["category"],$type);
        $songarray[$count]=$songs;
        $count++;
      }

      return $songarray;
    }

    //function to return distinct categories

    public function getCategories(){
      $this->db->select('songs.category');
      $this->db->distinct();
      $this->db->from('songs');
      $query=$this->db->get();
      return $query->result_array();
    }

    //fetch the song url
    public function getUrl($name){
      $cloudfronter=CloudFrontClient::factory(
        [
          'version'=>'latest',
          'region'=>'us-west-2'
        ]
      ) ;

      $object=$name;
      $expiry=new DateTime('100 minutes');
      $mydomain="https://d2j0a5a8fluhvl.cloudfront.net";

      $url=$cloudfronter->getSignedUrl(
        [
          'private_key'=>'/opt/lampp/htdocs/isong/application/models/pk-APKAIQO2AVFJ7UUI5QVQ.pem',
          'key_pair_id'=>'APKAIQO2AVFJ7UUI5QVQ',
          'url'=>$mydomain.'/'.$object,
          'expires'=>$expiry->getTimestamp()

        ]
        );

        return $url;

    }
   


    // function to the albums available
     public function getAlbumsIn($limit,$page){
       $this->db->SELECT("*");
       $this->db->from('albums');
       $this->db->limit($limit,$page);
       $query=$this->db->get();
       return $query->result_array();
     }  


    // function to get songs of the same album

    public function getAlbumSongsIn($album){
        if(!empty($album)){


               $this->db->select(   'songs.id,
                            songs.category,
                            songs.price,
                            songs.title,
                            songs.video,
                            songs.performance,
                            artist.name, 
                            albums.name, 
                            albums.image                        
                          ');
      $this->db->from('songs');

      $this->db->join('artist','songs.artist=artist.artistid');
      $this->db->join('albums','songs.album=albums.albumid');
     
     //$this->db->like('albums.name','Nukuu');
     $this->db->order_by("songs.performance", "desc");
      $where="album='".$album."'";
      $this->db->where($where);

      $this->db->limit(50,0);
      $query= $this->db->get();

      return $query->result_array();


         
        }else{
            
        }

    }

    // function to get the list of artist
    public function getArtist($limit,$page){
        $query=$this->db->get('artist',$limit,$page);
        return $query->result_array();
    }


        // function to create a song in the database\

   //insert into the product table;
 public function create_item($datan){
    //check session first
        //$post_image=$datan['imageuri'];
        $videouri=$datan;

        $data = array('id' =>$this->input->post('') ,
          
       'title'=>$this->input->post('songtitle'),
      'category'=>$this->input->post('category'),
      'artist'=>$this->input->post('artistid'),
      'album'=>$this->input->post('id'),
      'artist'=>$this->getArtistId($this->input->post('id')),
      'price'=>$this->input->post('songprice'),
      'type'=> $this->input->post('type'),
      'video'=>$videouri,
      );
      $this->db->insert('songs',$data);
      $lastid=$this->db->insert_id();
      $this->createSound($lastid);

}

// function the songs of an artist
public function  getArtistsongsIn($id){

      $this->db->select(   'songs.id,
                            songs.category,
                            songs.price,
                            songs.title,
                            songs.video,
                            songs.performance,
                            artist.name, 
                            albums.name, 
                            albums.image                        
                          ');
      $this->db->from('songs');

      $this->db->join('artist','songs.artist=artist.artistid');
      $this->db->join('albums','songs.album=albums.albumid');
     
     //$this->db->like('albums.name','Nukuu');
     $this->db->order_by("songs.performance", "desc");
      $where="artist='".$id."'";
      $this->db->where($where);

      $this->db->limit(50,0);
      $query= $this->db->get();

      return $query->result_array();
}
    
//function to fetch the adverts
public function getAdverts(){
    $query=$this->db->get('advert');
    return $query->result_array();
}


//function to get the joined songs

public function getSongs($limit,$start,$category,$type){
        $this->db->select('songs.id,
                            songs.category,
                            songs.price,
                            songs.title,
                            songs.video,
                            artist.name, 
                            albums.name, 
                            albums.image                        
                          ');
      $this->db->from('songs');
     $where = "songs.category='".$category."'";
      $this->db->join('artist','songs.artist=artist.artistid');
      $this->db->join('albums','songs.album=albums.albumid');
      $this->db->where($where);
      $where = "songs.type='".$type."'";
      $this->db->where($where);
      $this->db->limit($limit,$start);
      $query= $this->db->get();

    return $query->result_array();
}




//search function
 public function Search($match){

          $match=metaphone($match);
        
      $this->db->select(   'songs.id,
                            songs.category,
                            songs.price,
                            songs.title,
                            songs.video,
                            artist.name, 
                            albums.name,
                            albums.image                         
                          ');
      $this->db->from('songs');

      $this->db->join('artist','songs.artist=artist.artistid');
      $this->db->join('albums','songs.album=albums.albumid');
     
     //$this->db->like('albums.name','Nukuu');
      $this->db->like('songs.sound',$match);

      $this->db->limit(50,0);
    $query= $this->db->get();

    return $query->result_array();
 }

 //function to create sound replicate
 //for the search

public function createSound($insertid){
  //echo "this is from creae".$insertid;

     $query=$this->db->get_where('songs', array('id'=>$insertid));
     $row=$query->result_array();
     $albumid="";
     $artistid="";

     $sounddata="";

     foreach ($row as $row) {
       $albumid=$row['album'];
       $artistid=$row['artist'];
       $sounddata.=metaphone($row['title'].' ');
     }
         // echo "<br>".$sounddata;
     $query=$this->db->get_where('albums', array('albumid'=>$albumid));
     $row=$query->result_array();
     foreach ($row as $row) {

      $sounddata.=metaphone($row['name'].' ');
     }


      $query=$this->db->get_where('artist', array('artistid'=>$artistid));
     $row=$query->result_array();
     foreach ($row as $row) {

     $sounddata.=metaphone($row['name'].' ');
     }


      //  need to update the search


             $data = array('sound' =>$sounddata);
                 $this->db->where('id',$insertid);
                 $this->db->update('songs',$data);

    

    return $sounddata;

}

//function to fetch the top songs

  public function topSongs(){
       $this->db->select(   'songs.id,
                            songs.category,
                            songs.price,
                            songs.title,
                            songs.video,
                            songs.performance,
                            artist.name, 
                            albums.name,
                            albums.image                         
                          ');
      $this->db->from('songs');

      $this->db->join('artist','songs.artist=artist.artistid');
      $this->db->join('albums','songs.album=albums.albumid');
     
     //$this->db->like('albums.name','Nukuu');
     $this->db->order_by("songs.performance", "desc");


      $this->db->limit(50,0);
    $query= $this->db->get();

    return $query->result_array();
  }

//function to get the album's artis id

  public function getArtistId($albumid){
    $result=$this->db->get_where('albums' ,array('albumid' =>$albumid , ));
      $results=$result->result_array();
      $id="";
    foreach ($results as $row) {
      $id=$row['artistid'];
    }

    return $id;

  }

  //function to get the 

  public function playlist($phone){
    $this->db->select(
                           'songs.id,
                            songs.category,
                            songs.price,
                            songs.title,
                            songs.video,
                            songs.performance,
                            artist.name, 
                            albums.name,
                            albums.image, 
                            ');
        $this->db->from('songs');
        $this->db->join('playlist','songs.id=playlist.songid');
        $this->db->join('artist','songs.artist=artist.artistid');
        $this->db->join('albums','songs.album=albums.albumid');
        $where = "playlist.phone='".$phone."'";
        $this->db->where($where);
        $query=$this->db->get();

       return $query->result_array();
    
  } 
}
?>