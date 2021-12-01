<?php
$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php'); 


class Catagory{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllCat(){
		$query = "SELECT * FROM tbl_catagory ORDER BY catId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllCatId($catid){
			$query = "SELECT * FROM tbl_catagory WHERE catId =$catid";
			$result = $this->db->select($query);
			return $result;
		}


		public function catInsert($data){
		$catName = $this->fm->validation($data['catName']);
		$catName = mysqli_real_escape_string($this->db->link, $catName);
		if (empty($catName)) {
				$msg = "field must not be empty";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_catagory(catName)VALUES('$catName')";
				$catinsert = $this->db->insert($query);
				if ($catinsert) {
					$msg= "<span class=''>Success</span>";
					return $msg;
				}else{
					$msg=  "<span class=''>Try again</span>";
					return $msg;
				}
			}
	}


	public function catUpdate($data,$id){
				$catName = $this->fm->validation($data['catName']);
		$catName = mysqli_real_escape_string($this->db->link, $catName);
		$id = mysqli_real_escape_string($this->db->link, $id);
		if (empty($catName)) {
				$msg = "field must not be empty";
				return $msg;
	}else{
		$query = " UPDATE tbl_catagory
				   SET
				   catName = '$catName'
				   WHERE catId = '$id'";
				   $catUpdate = $this->db->update($query);
				   if ($catUpdate) {
					$msg= "<span class=''>Success</span>";
					return $msg;
				}else{
					$msg=  "<span class=''>Try again</span>";
					return $msg;
				}
	}


}
	public function delCatById($id){
		//$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM tbl_catagory WHERE catId = '$id'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>Catagory Deleted Successfully.</span>";
			return $msg;
		}
	}

	
}
?>