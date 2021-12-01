<?php
$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php'); 


class Brand{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllBrand(){
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllBrandId($brid){
			$query = "SELECT * FROM tbl_brand WHERE brandId =$brid";
			$result = $this->db->select($query);
			return $result;
		}
			public function brandInsert($data){
		$brandName = $this->fm->validation($data['brandName']);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		if (empty($brandName)) {
			$msg = "field must not be empty";
			return $msg;
		}else{
				$query = "INSERT INTO tbl_brand(brandName)VALUES('$brandName')";
				$brandinsert = $this->db->insert($query);
			if ($brandinsert) {
					$msg= "<span class=''>Success</span>";
					return $msg;
			}else{
					$msg=  "<span class=''>Try again</span>";
					return $msg;
			}
		}

	}
	public function brandUpdate($data,$id){
		$brandName = $this->fm->validation($data['brandName']);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		$id = mysqli_real_escape_string($this->db->link, $id);
		if (empty($brandName)) {
				$msg = "field must not be empty";
				return $msg;
	}else{
		$query = " UPDATE tbl_brand
				   SET
				   brandName = '$brandName'
				   WHERE brandId = '$id'";
				   $brandUpdate = $this->db->update($query);
				   if ($brandUpdate) {
					$msg= "<span class=''>Success</span>";
					return $msg;
				}else{
					$msg=  "<span class=''>Try again</span>";
					return $msg;
				}
	}

	}
	public function delBrandById($id){
		//$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>Brand Deleted Successfully.</span>";
			return $msg;
		}
	}
}
?>