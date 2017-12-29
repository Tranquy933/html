<?php 
	session_start();
	include('../inc/connect.php');
	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	$quanti = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
	$sql = "SELECT * FROM product WHERE id = ".$id." ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$product = [];
	$product[$row['id']] = $row;
	if (!isset($_SESSION['cart']) or empty($_SESSION['cart'])) {
		$product[$id]['quantity'] = $quanti;
		$_SESSION['cart'][$id] = $product[$id];
	}
	else{
		if (array_key_exists($id, $_SESSION['cart'])) {
			$_SESSION['cart'][$id]['quantity'] +=$quanti;
		}
		else{
			$product[$id]['quantity'] = $quanti;
			$_SESSION['cart'][$id] = $product[$id];
		}
	}
	// echo "<pre>";
	// print_r($_SESSION['cart']);
	header('location:../cart.php');
 ?>
	