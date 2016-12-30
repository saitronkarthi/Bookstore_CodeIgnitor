 <?php  
 class Register extends CI_Controller {  
      public function __construct(){  
           parent::__construct(); 
         
           $this->load->model("Register_model");  
           
      }        
      public function index()  
      { 

      $this->insertCustomer();       
      }  
      public function insertCustomer()  
      {  

      $data['msg'] = 'Please fill the following fields:';
           $this->form_validation->set_rules('username', 'UserName', 'required');  
            $this->form_validation->set_rules('password', 'Password', 'required');  
            $this->form_validation->set_rules('address', 'Address', 'required');  
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('email','email','required'); 
            $pwd=$this->input->post('password');
            
           if ($this->form_validation->run())  
           {      
            $register = array(
                        'username'         => $this->input->post('username'),
                        'password'   => md5($pwd),
                        'address'       => $this->input->post('address'),
                        'phone'       => $this->input->post('phone'),
                        'email'       => $this->input->post('email')

                  );

                 $regval= $this->Register_model->create_users($register);
                 
                 if($regval=='success')
                 {  
                  //  $msg = "New user registered, login to proceed..";

     $data = array('msg' => 'New user registered, login to proceed..'); 
                   
                 }
                  else
                       
                      $data = array('msg' => 'Sorry, try a different username..'); 
                  
           }
             
             
            $this->load->view('Register_view',$data);       
      }  
 }  
 ?>  