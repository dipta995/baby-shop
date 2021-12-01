<?php
 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php'); 
Session::checkLogin();
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 

 ?>
<?php

	class Customerlogin{
		private $db;
		private $fm;
		// construct can access anywhere in class
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		} 

		public function customerLogin($email, $password){
			$email = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			$email = mysqli_real_escape_string($this->db->link, $email);
			$password = mysqli_real_escape_string($this->db->link, $password);

			if (empty($email) || empty($password)) {
				$loginmsg = "field must not be empty";
				return $loginmsg;
			}else{
				$query = "SELECT * FROM tbl_customer WHERE email= '$email' and password = '$password'";
				$result = $this->db->select($query);
				if ($result != false ) {
					$value = $result->fetch_assoc();
					Session::set("customerlogin",true);
					Session::set("customerId",$value['customerId']);
					Session::set("firstName",$value['firstName']);
					Session::set("lastName",$value['lastName']);
					header('Location: index.php');

				}else{
					$loginmsg = "Invelied user or password";
					return $loginmsg;

				}

			}

		}
		public function customerregister($data){
		$firstName = $this->fm->validation($data['firstName']);
		$firstName = mysqli_real_escape_string($this->db->link, $firstName);
		$lastName = $this->fm->validation($data['lastName']);
		$lastName = mysqli_real_escape_string($this->db->link, $lastName);
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$address = $this->fm->validation($data['address']);
		$address = mysqli_real_escape_string($this->db->link, $address);
		$phone = $this->fm->validation($data['phone']);
		$phone = mysqli_real_escape_string($this->db->link, $phone);
		$password = $this->fm->validation($data['password']);
		$password = mysqli_real_escape_string($this->db->link, $password);

		if (empty($firstName)) {
			 
		}else{
			 $query = "INSERT INTO tbl_customer(firstName,lastName,email,phone,address,password)VALUES('$firstName','$lastName','$email','$phone','$address','$password')";
	    $insert_row = $this->db->insert($query);
				if ($insert_row) {
					$msg= "<span class='success'>Success</span>";
					header('Location: login.php');
					return $msg;
				}else{
					$msg=  "<span class='error'>Try again</span>";
					return $msg;
				}
		}
 
		}

		public function getallcustomer(){
			$query = "SELECT * FROM tbl_customer ORDER BY customerId DESC";
		$result = $this->db->select($query);
		return $result;
		}



		

	}


?>
