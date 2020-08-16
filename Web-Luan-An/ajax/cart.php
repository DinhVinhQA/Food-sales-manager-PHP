<?php
include('class_cart.php');
session_start();
$Cart = new Shopping_Cart('shopping_cart');

if ( !empty($_GET['masp']) && !empty($_GET['soluongsp']) ) {

	$quantity = $Cart->getItemQuantity($_GET['masp'])+$_GET['soluongsp'];
	$Cart->setItemQuantity($_GET['masp'], $quantity);

}

if ( !empty($_GET['soluongsp']) ) {
	foreach ( $_GET['soluongsp'] as $order_code=>$quantity ) {
		$Cart->setItemQuantity($order_code, $quantity);
	}
}
if (!empty($_GET['remove']) ) {
	foreach ( $_GET['remove'] as $order_code ) {
		$Cart->setItemQuantity($order_code, 0);
	}
}

$Cart->save();
header('Location:../shop-cart.php');

?>