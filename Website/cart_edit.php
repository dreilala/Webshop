<?php session_start(); ?>
<?php
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']=array();	
	}
	
	$action=$_POST["action"];
	if($action != "empty"){
		$product_id = $_POST["id"];
		if($action != "remove"){
			$menge = $_POST["menge"];
			if(!array_key_exists($product_id,$_SESSION['cart'])||!isset($_SESSION['cart'][$product_id])){
				$_SESSION['cart'][$product_id]=0;	
			}
		}		
	}
	
	switch($action) {	//decide what to do	
		case "add":
			$_SESSION['cart'][$product_id]+=$menge;
		break;
		case "set":
			$_SESSION['cart'][$product_id]=$menge;
		break;
					
		case "remove":
			unset($_SESSION['cart'][$product_id]);
			if(count($_SESSION['cart'])==0){unset($_SESSION['cart']);}
		break;
					
		case "empty":
			unset($_SESSION['cart']);
		break;
	}
				
header('Location: cart.php');
?>