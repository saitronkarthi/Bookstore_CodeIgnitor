<?php  
 Class Shoppingcart_model extends CI_Model {  
Public function LoadCartItems($scart) 
{ 
	 $Bid=$scart['Bid'];
	 $query=$this->db->query("select title,price,book.isbn,name,number from book,author,writtenby,contains where contains.basketID like'".$Bid."'  and author.ssn = writtenby.ssn and 
	 	book.isbn = writtenby.isbn and book.isbn = contains.isbn");
	 return $result=$query->result();
}
public function BuyItems($icart)
{
	$Bid=$icart['basketID'];
	$query=$this->db->query("select * from contains where basketID='".$Bid."'");
	return $result=$query->result();

}
public function updatestock($ucart)
{
	$isbn=$ucart['isbn'];
	$uname=$ucart['username'];
	$number=$ucart['number'];
	$bid=$ucart['basketID'];
	echo $bid;

$q = $this -> db
       -> select('warehousecode')
       -> where('isbn', $isbn)
       -> limit(1)
       -> get('stocks');
       $wcode = $q->result()[0]->warehousecode;
  $insqry=$this->db->query("insert into shippingorder values ('$isbn','$wcode','$uname',$number)");
  $updqry = $this->db->query("update stocks set number=number-$number where isbn = '$isbn'");			
  $delcontents =$this->db->query("delete from contains where basketID='$bid' and ISBN='$isbn'");
  return true;
}


}
