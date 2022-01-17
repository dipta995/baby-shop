<?php
$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php'); 

?>
<?php
class Product{
	private $db;
	private $fm;
		
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllProduct(){
		$query = "SELECT * FROM tbl_product ORDER BY RAND()";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllProductFrontpage(){
			$query = "SELECT * FROM tbl_product ORDER BY RAND() limit 10 ";
			$result = $this->db->select($query);
			return $result;
		}


	public function Searchproduct($key){
		$query = "SELECT * FROM tbl_product LEFT JOIN tbl_catagory ON tbl_product.catId = tbl_catagory.catId WHERE productName  LIKE '%$key%' OR body LIKE '%$key%' ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllProductletest(){
		$query = "SELECT * FROM tbl_product ORDER BY uploadtime DESC limit 10";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllProductByCat($catid){
		$query = "SELECT * FROM tbl_product WHERE catId = $catid ";
		$result = $this->db->select($query);
		return $result;
	}
	public function relatedproductview($catid){
		$query = "SELECT * FROM tbl_product WHERE catId = $catid ORDER BY RAND() limit 20 ";
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllProductByBr($brandid){
		$query = "SELECT * FROM tbl_product WHERE brandId = $brandid ORDER BY productId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function bestproduct(){
		$query = "SELECT * FROM tbl_product  ORDER BY RAND() limit 3 ";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProById($id){
		$query = "SELECT * FROM tbl_product WHERE productId='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getOfferproduct(){
			$query = "SELECT * FROM tbl_product WHERE offer=1";
			$result = $this->db->select($query);
			return $result;
		}

	public function getOfferproductlimet(){
				$query = "SELECT * FROM tbl_product WHERE offer=1  ORDER by uploadtime desc limit 3";
				$result = $this->db->select($query);
				return $result;
			}


		public function getOfferproductrand(){
			$query = "SELECT * FROM tbl_product ORDER BY RAND() limit 1";
			$result = $this->db->select($query);
			return $result;
		}





			public function getAllProductadmin(){
		$query = "SELECT * FROM tbl_product LEFT JOIN tbl_catagory ON tbl_product.catId = tbl_catagory.catId INNER JOIN tbl_brand ON  tbl_product.brandId =tbl_brand.brandId INNER JOIN  tbl_quantity ON tbl_product.quantityId =tbl_quantity.quantityId ORDER BY productId DESC";
		$result = $this->db->select($query);
		return $result;
	}

public function getAllOrderProductadmin(){
		$query = "SELECT * FROM tbl_order LEFT JOIN tbl_product ON tbl_product.productId = tbl_order.productId INNER JOIN tbl_customer ON  tbl_order.customerId =tbl_customer.customerId WHERE confirm=0  ORDER BY inday DESC";
		$result = $this->db->select($query);
		return $result;
	}

public function getAllSoldProductadmin(){
		$query = "SELECT * FROM tbl_order LEFT JOIN tbl_product ON tbl_product.productId = tbl_order.productId INNER JOIN tbl_customer ON  tbl_order.customerId =tbl_customer.customerId WHERE confirm=1  ORDER BY inday DESC";
		$result = $this->db->select($query);
		return $result;
	}



	public function getAllProductadminByid($prid){
			$query = "SELECT * FROM tbl_product LEFT JOIN tbl_catagory ON tbl_product.catId = tbl_catagory.catId INNER JOIN tbl_brand ON  tbl_product.brandId =tbl_brand.brandId INNER JOIN  tbl_quantity ON tbl_product.quantityId =tbl_quantity.quantityId WHERE productId='$prid'";
			$result = $this->db->select($query);
			return $result;
		}
	public function getAllProductadminByOutofStock(){
			$query = "SELECT * FROM tbl_product LEFT JOIN tbl_catagory ON tbl_product.catId = tbl_catagory.catId INNER JOIN tbl_brand ON  tbl_product.brandId =tbl_brand.brandId INNER JOIN  tbl_quantity ON tbl_product.quantityId =tbl_quantity.quantityId WHERE total_quantity='0'";
			$result = $this->db->select($query);
			return $result;
		}


	public function Insertproduct($data,$file){
		$productName = $this->fm->validation($data['productName']);
		$productName = mysqli_real_escape_string($this->db->link, $productName);
		$catId = $this->fm->validation($data['catId']);
		$catId = mysqli_real_escape_string($this->db->link, $catId);
		$brandId = $this->fm->validation($data['brandId']);
		$brandId = mysqli_real_escape_string($this->db->link, $brandId);
		$body = $this->fm->validation($data['body']);
		$body = mysqli_real_escape_string($this->db->link, $body);
		$price = $this->fm->validation($data['price']);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$quantityId = $this->fm->validation($data['quantityId']);
		$quantityId = mysqli_real_escape_string($this->db->link, $quantityId);
	 	$offer = $this->fm->validation($data['offer']);
		$offer = mysqli_real_escape_string($this->db->link, $offer);
	 	$productCode = $this->fm->validation($data['productCode']);
		$productCode = mysqli_real_escape_string($this->db->link, $productCode);
		$total_quantity = $this->fm->validation($data['total_quantity']);
		$total_quantity = mysqli_real_escape_string($this->db->link, $total_quantity);
	 


		$permited  = array('jpg', 'jpeg', 'png', 'gif' ,'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images/".$unique_image;
	    $move_image = "../images/".$unique_image;

	    if ($productName == "" || $catId =="" || $brandId == "" || $body== "" || $price == "" || $total_quantity=="") {
	    	$msg = "<span class='error'>Field must not be empty.</span>";
			return $msg;
	    }if (empty($file_name)) {
	     echo "<span class='error'>Please Select any Image !</span>";
	    }elseif ($file_size >1048567) {
	     echo "<span class='error'>Image Size should be less then 1MB!
	     </span>";
	    } elseif (in_array($file_ext, $permited) === false) {
	     echo "<span class='error'>You can upload only:-"
	     .implode(', ', $permited)."</span>";
	    }else{
	    move_uploaded_file($file_temp, $move_image);
	    $query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,quantityId,offer,productCode,total_quantity)VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$quantityId','$offer','$productCode','$total_quantity')";
	    $insert_row = $this->db->insert($query);
				if ($insert_row) {
					$msg= "<span class='btn btn-success'>Product Uploaded Successfully</span>";
					return $msg;
				}else{
					$msg=  "<span class='btn btn-danger'>Something wrong try again</span>";
					return $msg;
				}
			}
	}
	public function Updateproduct($data,$file,$id){
		$productName = $this->fm->validation($data['productName']);
		$productName = mysqli_real_escape_string($this->db->link, $productName);
		$catId = $this->fm->validation($data['catId']);
		$catId = mysqli_real_escape_string($this->db->link, $catId);
		$brandId = $this->fm->validation($data['brandId']);
		$brandId = mysqli_real_escape_string($this->db->link, $brandId);
		$body = $this->fm->validation($data['body']);
		$body = mysqli_real_escape_string($this->db->link, $body);
		$price = $this->fm->validation($data['price']);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$quantityId = $this->fm->validation($data['quantityId']);
		$quantityId = mysqli_real_escape_string($this->db->link, $quantityId);
		$offer = $this->fm->validation($data['offer']);
		$offer = mysqli_real_escape_string($this->db->link, $offer);
		
		$total_quantity = $this->fm->validation($data['total_quantity']);
		$total_quantity = mysqli_real_escape_string($this->db->link, $total_quantity);


		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images/".$unique_image;
	    $move_image = "../images/".$unique_image;

	    if ($productName == "" || $total_quantity == "" || $catId =="" || $brandId == "" || $body== "" || $price == "" ) {
	    	$msg = "<span class='error'>Field must not be empty.</span>";
			return $msg;
	    }else{
	    	if (!empty($file_name)) {
	    
		    if ($file_size >1048567) {
		     echo "<span class='error'>Image Size should be less then 1MB!
		     </span>";
		    } elseif (in_array($file_ext, $permited) === false) {
		     echo "<span class='error'>You can upload only:-"
		     .implode(', ', $permited)."</span>";
		    }else{
		    move_uploaded_file($file_temp, $move_image);
		
		    $query = "UPDATE tbl_product
		    			SET
		    			productName = '$productName',
		    			catId = '$catId',
		    			brandId = '$brandId',
		    			quantityId = '$quantityId',
		    			offer = '$offer',
		    			body = '$body',
		    			price = '$price',
						total_quantity = '$total_quantity',
		    			image = '$uploaded_image'
		    		
		    			WHERE productId = '$id'";

		    $updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg= "<span class='success'>Success</span>";
						return $msg;
					}else{
						$msg=  "<span class='error'>Try again</span>";
						return $msg;
					}
				}
				
			}else{
					$query = "UPDATE tbl_product
		    			SET
		    			productName = '$productName',
		    			catId = '$catId',
		    			brandId = '$brandId',
		    			quantityId = '$quantityId',
		    			offer = '$offer',
						total_quantity = '$total_quantity',
		    			body = '$body',
		    			price = '$price'
		    		
		    			WHERE productId = '$id'";

		    $updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg= "<span class='success'>Success</span>";
						return $msg;
					}else{
						$msg=  "<span class='error'>Try again</span>";
						return $msg;
					}
				}
			}
	}


	public function delProById($id){
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$getdata = $this->db->select($query);
		if ($getdata) {
			while ($delimg= $getdata->fetch_assoc()) {
				$dellink = '../'.$delimg['image'];
				unlink($dellink);
			}
		}
		$dequery = "DELETE FROM tbl_product WHERE productId = '$id'";

		$deldata = $this->db->delete($dequery);
		if ($deldata) {
			$msg= "<span class='success'>Success</span>";
		 
			echo "<script> window.location = 'viewproduct.php';</script>";
			return $msg;
		}else{
			$msg=  "<span class='error'>Try again</span>";
			return $msg;
		}
	}
public function singleproductquantity($id)
{
		$query = "SELECT * FROM tbl_product  WHERE productId= '$id'";
				$result = $this->db->select($query);
			 
					 $value = $result->fetch_assoc();
					return $value['total_quantity'];
				}
	

 
	public function checkorderproducgt($id,$customerId)
	{
		$query = "SELECT * FROM tbl_order  WHERE productId= '$id' AND customerId='$customerId'";
				$result = $this->db->insert($query);
			 
					if(mysqli_num_rows($result)>0)
					{
						return "Success";
					}
	}
	 
}
?>