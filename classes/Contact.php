<?php
$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php'); 


class Contact{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllQuantity(){
		$query = "SELECT * FROM tbl_contact ORDER BY con_id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function sendmessage($data){
		$firstname = $this->fm->validation($data['firstname']);
		$firstname = mysqli_real_escape_string($this->db->link, $firstname);
		$lastname = $this->fm->validation($data['lastname']);
		$lastname = mysqli_real_escape_string($this->db->link, $lastname);
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$subject = $this->fm->validation($data['subject']);
		$subject = mysqli_real_escape_string($this->db->link, $subject);
		$message = $this->fm->validation($data['message']);
		$message = mysqli_real_escape_string($this->db->link, $message);
		if (empty($firstname) ||empty($lastname) ||empty($email) ||empty($subject) ||empty($message) ) {
			echo "<span style='color:red;'>Field must not be empty</span>";
		}else{
			 $query = "INSERT INTO tbl_contact(firstname,lastname,email,subject,message)VALUES('$firstname','$lastname','$email','$subject','$message')";
	    $insert_row = $this->db->insert($query);
				if ($insert_row) {
					echo "<span class='success'>Success</span>";
					 
				}else{
					echo "<span class='error'>Try again</span>";
					 
				}
		}
	}

	public function delmsg($id){
		$delq = "DELETE FROM tbl_contact WHERE con_id = '$id'";
		$deldata = $this->db->delete($delq);
					 echo "<script> window.location = 'message.php';</script>";
	}














	public function getavgrate($id){
		$query = "SELECT * FROM tbl_product WHERE productId=$id";
		$result = $this->db->select($query);
		 
				 $value = $result->fetch_assoc();
				 if ($value['total_rat']==0 || $value['hit']==0) {
				 	
				 }else{

				return $newval = round($value['total_rat']/$value['hit']);
				 }
	}
	public function ratsubmit($data,$proid,$customer_id){
			$query = "SELECT * FROM tbl_rat WHERE customer_id= '$customer_id' and productId = '$proid'";
				$result = $this->db->insert($query);
				if (mysqli_num_rows($result)>0 ) {
					echo "<span style='color:red;'>Alredy Rated</span>";
					}else{
		

		$query = "SELECT * FROM tbl_product WHERE productId=$proid";
		$result = $this->db->select($query);
 
				 $value = $result->fetch_assoc();
				 $totalrat = $value['total_rat'];
				 $hit = $value['hit'];
		$total_rat = $this->fm->validation($data['total_rat']);
		$total_rat = mysqli_real_escape_string($this->db->link, $total_rat);
		$finalrat = $total_rat+$totalrat;
		$hit = $hit+1;


		$query = " UPDATE tbl_product
				   SET
				   total_rat = '$finalrat',
				   hit = '$hit'
				   WHERE productId = '$proid'";
				   $brandUpdate = $this->db->update($query);
				   $query = "INSERT INTO tbl_rat(customer_id,productId)VALUES('$customer_id','$proid')";
				$catinsert = $this->db->insert($query);
		}
	}
}
?>