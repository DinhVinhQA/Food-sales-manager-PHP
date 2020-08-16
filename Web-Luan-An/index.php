<?php 
	session_start();
	$_SESSION["page"]="index.php";
	include_once "header.php";
	
	include_once "nav.php";
	include_once "banner.php";
	include_once "about.php";
	include_once "featured-product.php";
	include_once "why-choose-us.php";
	include_once "product-hot.php";
	include_once "news.php";
	include_once "footer.php";
 ?>