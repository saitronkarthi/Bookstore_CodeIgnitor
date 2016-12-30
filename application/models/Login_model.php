 <?php  
 Class Login_model extends CI_Model {  
Public function userlogin($login) 
{ /*$this->db->insert('customer',$register);
  return $this->db->insert_id();*/
 
 $pwd=$login['password'];
 $condition = "username =" . "'" . $login['username'] . "' AND " . "password =" . "'" . md5($pwd) . "'";
$this->db->select('*');
$this->db->from('customer');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

	if ($query->num_rows() == 1) {
	return true;
		} else {
	return false;
	}
}

public function insertbasket($basket)
{
	$this->db->insert('shoppingbasket',$basket);

}

       }  
    ?>

