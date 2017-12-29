<?php 
	session_start();
	if (isset($_POST['update'])) {
		unset($_POST['update']);
		foreach ($_POST as $productId => $quantity) {
			$_SESSION['cart'][$productId]['quantity'] = $quantity;
		}
	}
	header('location:../cart.php');
 ?>