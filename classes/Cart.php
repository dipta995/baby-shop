<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Session.php'); 

 ?>
<?php

class Cart{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCart($quantity,$id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();

		$query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
		$result = $this->db->select($query)->fetch_assoc();

		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];

		$squery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
		$getpro = $this->db->select($squery);
		if ($getpro) {
			$msg = "Product Already Added";
			return $msg;
		}else{


		
		$query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image)VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
				$insert_row = $this->db->insert($query);
			if ($insert_row) {
					echo "<script> window.location = 'cart.php';</script>";
					 
			}else{
					echo "<script> window.location = 'error.php';</script>";
			}
		}	
	}
	public function addToOrder($customerId){
	/*	$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);*/
		$sId = session_id();

		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getcart = $this->db->select($query);
		while ($res = $getcart->fetch_assoc()) {
			 
		

		$productId  = $res['productId'];
		$productName = $res['productName'];
		$price = $res['price'];
		$quantity = $res['quantity'];
		$image = $res['image'];
	

		$query = "INSERT INTO tbl_order(customerId,productId,productName,price,quantity,image)VALUES('$customerId','$productId','$productName','$price','$quantity','$image')";
				$insert_row = $this->db->insert($query);
				
				$sl = "SELECT * FROM tbl_product  WHERE productId= '$productId'";
				$result = $this->db->select($sl);
					 $value = $result->fetch_assoc();
					$total_quantity = $value['total_quantity'];
					$total = $total_quantity-$quantity;
					
			 $up = " UPDATE tbl_product
				   SET
				   total_quantity = '$total'
				   WHERE productId = '$productId'";
				   $productupdate = $this->db->update($up);
				$delq = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$deldata = $this->db->delete($delq);
					
				 
			 	}
 echo "<script> window.location = 'checkout-final1.php';</script>";
	}
	public function getCartProduct(){
		$sId = session_id();

		$query = "SELECT * FROM tbl_cart left join tbl_product on tbl_cart.productId = tbl_product.productId WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;

	}
	public function getOrderProduct($customerId){
	 

		$query = "SELECT * FROM tbl_order WHERE customerId = '$customerId' AND inday = NOW() ";
		$result = $this->db->select($query);
		return $result;

	}
	public function getOrderProductfinal($customerId){
	 

		$query = "SELECT * FROM tbl_order WHERE customerId = '$customerId' order by confirm asc";
		$result = $this->db->select($query);
		return $result;

	}
	public function updateCartQuantity($cartId, $quantity){
		$cartId = $this->fm->validation($cartId);
		$quantity = $this->fm->validation($quantity);
		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

		$query = " UPDATE tbl_cart
				   SET
				   quantity = '$quantity'
				   WHERE cartId = '$cartId'";
				   $quanUpdate = $this->db->update($query);
				   if ($quanUpdate) {
					 echo "<script> window.location = 'cart.php';</script>";
					}else{
						$msg=  "<span class='danger'>Try again</span>";
						return $msg;
					}
	}


	public function updateordertable($orderid){
		$query = " UPDATE tbl_order
				   SET
				   confirm = 1
				   WHERE orderId = '$orderid'";
				   $quanUpdate = $this->db->update($query);
				   if ($quanUpdate) {
					 echo "<script> window.location = 'order.php';</script>";
					}else{
						$msg=  "<span class='danger'>Try again</span>";
						return $msg;
					}
	}
	public function delProductById($delId){
		$cartId = mysqli_real_escape_string($this->db->link, $delId);
		$query = "DELETE FROM tbl_cart WHERE cartId = '$delId'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			echo "<script>window.location = 'cart.php'; </script>";
		}else{
			$msg=  "<span class='danger'>not deleted</span>";
						return $msg;
		}
	}
	public function checkCart(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;

	}
	public function checkOrder($customerId){
		$sId = session_id();
		$query = "SELECT * FROM tbl_order WHERE customerId = '$customerId' AND inday=NOW() ";
		$result = $this->db->select($query);
		return $result;

	}
	public function checkOrderfinal($customerId){
		$sId = session_id();
		$query = "SELECT * FROM tbl_order WHERE customerId = '$customerId'";
		$result = $this->db->select($query);
		return $result;

	}
}
?> 