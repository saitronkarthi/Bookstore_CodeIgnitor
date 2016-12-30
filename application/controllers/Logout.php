 <?php  
 
 class Logout extends CI_Controller {  
      public function __construct(){  
           parent::__construct(); 
         
        
           
      }        
      public function index()  
      { 
       $data['loginmsg'] = '';
    
       $this->logout();       
      }  

       public function logout()
      {
          $data['loginmsg'] = '';
          $this->session->sess_destroy();
          $this->load->view("Login_view",$data); 
      }
    }
