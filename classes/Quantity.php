<?php
$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php'); 


class Quantity{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllQuantity(){
		$query = "SELECT * FROM tbl_quantity ORDER BY quantityId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	
}
?>