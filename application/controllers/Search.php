 <?php  
 class Search extends CI_Controller {  
      public function __construct(){  
           parent::__construct(); 
         
           $this->load->model("Search_model");  
          
           
      }        
      public function index()  
      { 
        if(isset($this->session->userdata['ccount']))
          $data['cartcount'] = $this->session->userdata('ccount');
        else
           $data['cartcount'] ='';
       $data['sresult']='';
      $this->load->view("Search_view",$data);   
       //$this->chkUser();       
      }
      public function buttonprocess()
      {
       
        $data['cartcount'] = '';
        if(isset($_POST["logout"])) {
          $data['loginmsg'] = '';
          echo '1';
          $dcart = array(
                           'basketId'=>$this->session->userdata('Bid'));
          $this->Search_model->delbasket($dcart);
          $this->session->sess_destroy();
          redirect ('/login');
         // $this->load->view("Login_view",$data); 
           
          }

          if(isset($_POST["basket"])){
           
            redirect('/shoppingcart');
          }

      }
       public function addcart()
      {
         
         
       /* if( $this->session->userdata('Bid')=='')
        {
           $this->session->set_userdata('Bid',session_id()); 
     
        }*/
        
         $acart = array(
                        'ISBN' => $this->input->post('CartItems'),
                        'basketID'=>$this->session->userdata('Bid'),
                        'number'=>$this->input->post('CartItemsCount')
                    
                                 );

                $count = $this->Search_model->addcart($acart); 
                 $this->session->set_userdata('ccount',$count);
                 $data['cartcount']=$count;
                 $this->load->view("Search_view",$data);   


      
      }
      public function searchprocess()
      {
         
             if(isset($this->session->userdata['ccount']))
             {

                   $data['cartcount']=$this->session->userdata('ccount');
                   
               }
                 else
                 {
                  $data['cartcount'] = '';
                  
                }

       // $this->form_validation->set_rules('search', 'Search Value', 'required');
       if(isset($_POST["title"])) {
       
         
          $stext = array(
                        'search' => $this->input->post('search')
                    
                                 );

                $data['sresult'] = $this->Search_model->searchbooktitle($stext); 
                
                $this->load->view("Search_view",$data);   


        }
         if(isset($_POST["author"])){
  
             $stext = array(
                        'search' => $this->input->post('search')
                    
                                 );

                $data['sresult'] = $this->Search_model->searchbookauthor($stext); 
                

                $this->load->view("Search_view",$data);

          }
                  
     
           
          }

         

        
    }