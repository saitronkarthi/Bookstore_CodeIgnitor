

 <?php  
 Class Register_model extends CI_Model {  
Public function create_users($register) 
{ /*$this->db->insert('customer',$register);
  return $this->db->insert_id();*/
 
                if(!$this->db->insert('customer',$register)){
                    return 'fail';
                    
                }else{
                    return 'success';
                }


   }


         }  
    ?>

