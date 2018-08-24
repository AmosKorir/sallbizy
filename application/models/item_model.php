<?php
class item_model extends CI_model{

  public function get_items($slug=FALSE){
    if($slug===FALSE){
      $query=$this->db->get('product');
      return $query->result_array();
    }

    $query=$this->db->get('product', array('$slug' =>$slug ));
      return $query->result_array();

  }

  // geting a short list of data for display
  
  public function get_few(String $category='Phone'){
    $this->db->select();

    $where = "product_category='".$category."' AND status='idle' OR status='taken'";
    $this->db->from('product');
    $this->db->where($where);
    $query=$this->db->get();

    return $query->result_array();


    

    
    }
 
    //function to get the users uploaded its
    public function getMyitems($userid){
      $query = $this->db->get_where('product', array('userid' =>$userid));
      return $query->result_array();
    }
    //function to get brokers items

    public function getMyBrokes($userid){
     
       $query = $this->db->get_where('product', array('brokerid' =>$userid));
      
      return $query->result_array();
    }
    

   

    //function to get product with owners details
    public function get_mysells($id){

     
      $this->db->select('product.product_title,product.product_id,
                          product.status,
                          product.product_category,
                          product.price,
                          product.image,
                          userlogin.firstname,
                          userlogin.lastname,
                          userlogin.phone
                          ');
      $this->db->from('product');
      $this->db->join('userlogin','userlogin.userid=product.userid');
      $this->db->where('userlogin',$id);
      $query=$this->db->get();

      return $query->result_array();
    }

    


    //get where...two condictions
    public function get_category($category){
      
      $where = "product_category='".$category."' AND status='idle' OR status='taken'";
      $query = $this->db->get_where('product',$where);
      return $query->result_array();
    }


    //get single item by category an

    public function get_single($id){
       $this->db->select('product.product_title,
                          product.product_id,
                          product.status,
                          product.userid,
                           product.brokerid,
                          product.product_category,
                          product.price,
                          product.image,
                          product.description,
                          userlogin.firstname,
                          userlogin.lastname,
                          userlogin.phone
                          ');
      $this->db->from('product');
      $this->db->join('userlogin','userlogin.userid=product.userid');
      $this->db->where('product_id',$id);
      $query=$this->db->get();

      return $query->result_array();
    }

    
    








    // function to delete an item
    public function deleteitem($id){


      //select a single element first and get the image
        $query=$this->db->get_where('product', array('product_id' =>$id , ));
        $item=$query->row_array();
        $image=$item['image'];

        $gambar= $image;
        $path = './resources/images/'.$gambar;
        unlink($path);

       $this->db->where('product_id',$id);
       $this->db->delete('product');


    }

    
    //function to get my brokes
    public function getbrokes($userid) {


      $this->db->select('product.product_title,product.product_id,
                          product.status,
                          product.product_category,
                          product.price,
                          product.image,
                          userlogin.firstname,
                          userlogin.lastname,
                          userlogin.phone
                          ');
      $this->db->from('product');
      $this->db->join('userlogin','userlogin.userid=product.brokerid');
     
      $where = "brokerid='".$userid."' AND status='idle' OR status='taken'";
      $this->db->where($where);
      $query=$this->db->get();

      return $query->result_array();
    }

    // function to return a signle broker of an item
    public function get_broker($id){
     $query= $this->db->get_where('userlogin', array('userid'=>$id));
       

      return $query->row_array();
    }






    //function to get idle items
    public function getitemeidle() {
      $query = $this->db->get_where('product', array('status' =>'idle'));
      return $query->result_array();
    }


    // function to change the status of the item;
    public function changestatus($id){
      $userid=$this->session->userdata('userid');
      
      if (!empty($userid)) {
        $data = array('status' =>'taken','brokerid'=>$userid);
           $this->db->where('product_id',$id);
           $this->db->update('product',$data);

           }else{
            redirect('home');
          }
    
     
       }
      //  function done for the item
      public function done($id){
        $userid=$this->session->userdata('userid');
        
        if (!empty($userid)) {
            $data = array('status' =>'done');
             $this->db->where('product_id',$id);
             $this->db->update('product',$data);
  
             }else{
               redirect('home');
             }
       
         }

    


         //insert into the product table;
        public function create_item($post_image){
                        //check session first
                      $myid=$this->session->userdata('userid');
                      if(!empty($myid)){

                         $data = array('product_id' =>$this->input->post('') ,
                            
                          'userid'=>$myid,
                          'brokerid'=>'1',
                          'status'=>'idle',
                          'product_category'=>$this->input->post('productcategory'),
                          'product_title'=>$this->input->post('producttitle'),
                          'description'=>$this->input->post('productdesc'),
                          'price'=>$this->input->post('productprice')+100,
                          'image'=>  $post_image,
                          );
                          return $this->db->insert('product',$data);
                          redirect('hello');

                        }else{
                          redirect('hello');
                        }
        }

}


?>
