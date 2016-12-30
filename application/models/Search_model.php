 <?php  
 Class Search_model extends CI_Model {  
Public function searchbooktitle($search) 
{ 
 
 $stext=$search['search'];
 if($stext!='')
 {
 $query=$this->db->query("select title,price,book.isbn,name,number from book,author,writtenby,stocks where book.title like '".$stext."' and author.ssn = writtenby.ssn and book.isbn = writtenby.isbn and stocks.isbn = book.isbn and number!=0 Group By book.isbn");
  $rowcnt=$query->num_rows();
 if($rowcnt>=1)
     return $result=$query->result();
}
 else
 {
 	$query=$this->db->query("select title,price,book.isbn,name,number from book,author,writtenby,stocks where author.ssn = writtenby.ssn and book.isbn = writtenby.isbn and stocks.isbn = book.isbn and number!=0 Group By book.isbn");
  $rowcnt=$query->num_rows();
 if($rowcnt>=1)
     return $result=$query->result();
 }
}

Public function searchbookauthor($search) 
{ 
 
 $stext=$search['search'];
 if($stext!='')
 {
 $query=$this->db->query("select title,price,book.isbn,name,number from book,author,writtenby,stocks where author.name like '".$stext."' and author.ssn = writtenby.ssn and book.isbn = writtenby.isbn and stocks.isbn = book.isbn and number!=0 Group By book.isbn");
  $rowcnt=$query->num_rows();
 if($rowcnt>=1)
     return $result=$query->result();
}
 else
 {
 	$query=$this->db->query("select title,price,book.isbn,name,number from book,author,writtenby,stocks where author.ssn = writtenby.ssn and book.isbn = writtenby.isbn and stocks.isbn = book.isbn and number!=0 Group By book.isbn");
  $rowcnt=$query->num_rows();
 if($rowcnt>=1)
     return $result=$query->result();
 }



}

public function addcart($acart)
{
	$cbid=$acart['basketID'];
	$cisbn=$acart['ISBN'];
	$copies=$acart['number'];
	 $query=$this->db->query("select ISBN from contains where basketID='".$cbid."' and ISBN='".$cisbn."'");
	 $rowcnt=$query->num_rows();
	 if($rowcnt<1)
	     $this->db->insert('contains',$acart);
	 else
	 {
	 	$this->db->query("update contains set number=number+".(int) $copies." where basketID='".$cbid."' and ISBN='".$cisbn."'");
	 }
     $query=$this->db->query("select ISBN from contains where basketID='".$cbid."'");
     $rcnt=$query->num_rows();
     return $rcnt;

}


public function delbasket($dbasket)
{
	$dbid=$dbasket['Bid'];
	$query=$this->db->query("delete from shoppingBasket where basketID='".$dbid."'");
	return true;
}


       }  
    ?>