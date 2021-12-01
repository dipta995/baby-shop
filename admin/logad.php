<?php
 
spl_autoload_register(function($class){
  include_once "../classes/".$class.".php";

});
session_start();
 
$ad = new Adminlogin();
 
?>
<?php 

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		 
		echo $ad->adminLogin($_POST['username'],$_POST['password']);

	}
 ?>