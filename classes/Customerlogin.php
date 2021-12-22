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
		public function customerOtp($otp,$email)
		{
			$otp = $this->fm->validation($otp);
			$otp = mysqli_real_escape_string($this->db->link, $otp);
			$email = $this->fm->validation($email);
			$email = mysqli_real_escape_string($this->db->link, $email);
			if (empty($otp)) {
				 
			}else{

				$query = "SELECT * FROM tbl_customer WHERE email= '$email' and otp = '$otp'";
				$result = $this->db->select($query);
				if ($result != false ) {

				$query = " UPDATE tbl_customer
				   SET
				   status = '1'
				   WHERE email = '$email'";
				   $catUpdate = $this->db->update($query);
				   if ($catUpdate) {
					echo "<script> window.location = 'login.php';</script>";
				}else{
					$msg=  "<span class=''>Try again</span>";
					return $msg;
				}
			}else{
				$msg=  "<span class=''>Invalid Otp Try again</span>";
					return $msg;
			}
			}
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
				$query = "SELECT * FROM tbl_customer WHERE email= '$email' and password = '$password' and status=1";
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
		$otp = time();
		$querys = "SELECT * FROM tbl_customer WHERE email='$email'";
        $res = $this->db->insert($querys);
        $querya = "SELECT * FROM tbl_customer WHERE  phone='$phone'";
        $resa = $this->db->insert($querya);

        $otp = time();

		if (empty($firstName) || empty($lastName)|| empty($email)|| empty($address)|| empty($phone)|| empty($password)) {
			 $txt=  "<span class='error'>Field Must Not be Empty</span>";
					return $txt;
		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
			  	 			return $txt =  "<span class='error'>Only letters and white space allowed for first Name</span>";
		}
		elseif (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
	 			return $txt =  "<span class='error'>Only letters and white space allowed for last Name</span>";
		}
		 elseif ( strlen ($password) < 8) {  
		                return $txt =  "<span class='error'>Password Minimum 8 Digit</span>";  
                 
        } elseif ( strlen ($phone) != 11) {  
            return $txt =  "<span class='error'>Phone Only 11 Digit</span>";  
                     
        }elseif ( strlen ($address) > 120) {  
            return $txt =  "<span class='error'>Address maximum 120 words</span>";  
                     
        }elseif (mysqli_num_rows($res)>0){
            $txt = "<span class='error'>This Email Already been Registered </span>";
            return $txt;
        }
        elseif (mysqli_num_rows($resa)>0){
            $txt = "<span class='error'>This Mobile Number Already been Registered </span>";
            return $txt;
        }


		else{
			 $query = "INSERT INTO tbl_customer(firstName,lastName,email,phone,address,password,status,otp)VALUES('$firstName','$lastName','$email','$phone','$address','$password','0','$otp')";
	    $insert_row = $this->db->insert($query);

	     if($insert_row){
                  
                  $this->sendmail($email,$otp);
                     $txt =  "<script>window.location='otp.php?otp=".$email."';</script>";
                    return $txt;
                }
                else{
                    $txt = "<div class='error'>Something wrong</div>";
                    return $txt;
                }
				 
		}
 
		}

		public function getallcustomer(){
			$query = "SELECT * FROM tbl_customer ORDER BY customerId DESC";
		$result = $this->db->select($query);
		return $result;
		}


  public function sendmail($useremail,$otp){
        require("mail/src/PHPMailer.php");
 require("mail/src/SMTP.php");
 require("mail/src/Exception.php");
 require("mail/constants.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
   
   try {
      
       $mail->IsSMTP(); // enable SMTP
   
       //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
       $mail->SMTPAuth = true; // authentication enabled
       $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
       $mail->Host = "smtp.gmail.com";
       $mail->Port = 465; // or 587
       $mail->IsHTML(true);
       $mail->Username ="ssadman177@gmail.com";
       $mail->Password =PASSWORD;
       $mail->SetFrom("ssadman177@gmail.com");
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   
        $mail->isHTML(true); 
       $mail->Subject = "Your Otp And link";
       $mail->Body = "$otp";
       $mail->AddAddress($useremail);
       $mail->Send();
       
   } catch (Exception $e) {
        
   }
   
   }
		

	}


?>
