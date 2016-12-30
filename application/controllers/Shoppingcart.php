<?php  
 class Shoppingcart extends CI_Controller {  
      public function __construct(){  
           parent::__construct(); 
         
           $this->load->model("Search_model");  
            $this->load->model("Shoppingcart_model");
          
           
      }        
      public function index()  
      { 
       //  if($this->session->userdata('ccount')!='')
       //    $data['cartcount'] = $this->session->userdata('ccount');
       //  else
       //     $data['cartcount'] ='';
       // $data['sresult']='';
         $data['cartres']='';
         $data['cresult']='';
         $data['totalPrice']=0;
         
       $this->Loadcart();       
      }

      public function buttonevent()
      {
         if(isset($_POST["logout"])){
             $data['loginmsg'] = '';
          $dcart = array(
                           'Bid'=>$this->session->userdata('Bid'));
          $this->Search_model->delbasket($this->session->userdata($dcart));
          $this->session->sess_destroy();

          redirect ('/login');
          }
         if(isset($_POST["search"])){
          if(isset($this->session->userdata['ccount']))
             $data['cartcount'] = $this->session->userdata('ccount');
           else
            $data['cartcount'] ='';
         redirect("/search");

            
          }


      }

      public function Loadcart()
      {
                
         if(isset($this->session->userdata['ccount']))
         {
          $data['cartres']='';

          $scart = array(
                        'Bid' => $this->session->userdata('Bid')
                    
                                 );

                $data['cresult'] = $this->Shoppingcart_model->LoadCartItems($scart); 
                $products = array();
                $products=$data['cresult'];
                 $this->session->set_userdata('cartitems',$products);
              
                $totprice=0;

              foreach($products as $collection)
              {
                 $totprice=$totprice+($collection->number * $collection->price);        
                 
              }
              $data['totalPrice']=$totprice;
                
                $this->load->view("Shoppingcart_view",$data);   


         }
         else
         {

         $data['cartres']='Your Shopping cart appears empty';
         $this->load->view("Shoppingcart_view",$data); 
         

       }
      }
      public function buy()
      {
        echo 'add';
        if(isset($this->session->userdata['cartitems']))
        {
          $icart = array(
                        'basketID' => $this->session->userdata('Bid')
                    
                                 );
          $data['iresult'] = $this->Shoppingcart_model->BuyItems($icart); 
           $items = array();
            $items=$data['iresult'];
             foreach($items as $collection)
              {
                echo $collection->ISBN;
                echo $collection->number;
                          $ucart = array(
                        'isbn' => $collection->ISBN,
                        'number'=>$collection->number,
                        'username'=>$this->session->userdata('suser'),
                         'basketID' => $this->session->userdata('Bid')
                    
                                 );
                  $resval= $this->Shoppingcart_model->updatestock($ucart); 


                 
              }
                 $this->session->unset_userdata('ccount');
                redirect("/shoppingcart");
                  
          
        }

         
      }
    }