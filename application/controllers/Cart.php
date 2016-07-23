<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {


    public function __construct()
      {
         parent::__construct();
         $this->load->helper(array('url','language','form'));
        $this->load->database();
        $this->load->model('cart_model','',TRUE);
        $this->load->library('cart');
      }
    
    
    public function index()
    {

        
        $data['products'] = $this->cart_model->retrieve_products(); 
        $data['content'] = 'products'; // Select our view file that will display our products
        $this->load->view('index', $data); // Display the page with the above defined content
       
    }
    
    function add_cart_item(){     
    if($this->cart_model->validate_add_cart_item() == TRUE){
      
        if($this->input->post('ajax') == false){
            redirect('/'); 
        }else{
            echo 'true'; 
        }
    }else{
        echo "Validation Error";        
    }
     
}
  
    
    function show_cart(){
    $this->load->view('cart/cart');
}
 
  
    function update_cart(){
    $this->cart_model->validate_update_cart();
    redirect('cart');
}
 
    
    function empty_cart(){
    $this->cart->destroy(); // Destroy all cart data
    redirect('cart'); // Refresh te page
}
}


?>