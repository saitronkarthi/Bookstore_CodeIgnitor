 <?php  
 
 class Login extends CI_Controller {  
      public function __construct(){  
           parent::__construct(); 
         
           $this->load->model("Login_model");  
           
      }        
      public function index()  
      { 
       $data['loginmsg'] = '';
      


          if(isset($this->session->userdata['suser'])){
          	  $data['cartcount'] = '';
          	   $data['sresult']='';

	         $this->load->view("Search_view",$data);  
			}
			else
			{
				// $this->load->view("Login_view",$data);   
                $this->chkUser();  

			}

      }  

     
      public function chkUser()  
      {  


	      if(isset($this->session->userdata['suser'])){
            $data['cartcount'] = '';
             $data['sresult']='';

	         $this->load->view("Search_view",$data);  
			}else{
		



      	 $this->form_validation->set_rules('username', 'UserName', 'required');  
            $this->form_validation->set_rules('password', 'Password', 'required');  
                      
           if ($this->form_validation->run())  
           {      
            $login = array(
                        'username'         => $this->input->post('username'),
                        'password'   => $this->input->post('password')
                        

                  );

                 $loginval= $this->Login_model->userlogin($login);
                 if($loginval!=false)
                 {
                 	//$session_data=array('username'=>$this->input->post('username'));
                 	//$this->session->set_userdata('suser', $session_data);
                 	$this->session->set_userdata('suser', $this->input->post('username'));
                 	$BID = uniqid();
					 $this->session->set_userdata('Bid',$BID); 
					  $basket = array(
                        'basketID'         => $BID,
                        'username'   => $this->input->post('username')
                        

                  );
            echo $this->session->userdata('Bid');
					    $this->Login_model->insertbasket($basket);
                 	//$this->load->view("Search_view");  
                 	//$this->load->view('Search_view');
                 	redirect('/Search');

                 }
                 else
                 {
                 	 $data = array('loginmsg' => 'Please check your login credentails'); 
                 	 $this->load->view('Login_view', $data);
                 
                 }


      	}
      	else
      	{  
      		 $data['loginmsg'] = '';
      		$this->load->view('Login_view', $data);

      	}

		}
 
  }
}