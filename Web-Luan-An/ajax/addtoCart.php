<?php
	session_start();
	include_once "../conn.php";
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = "SELECT * FROM sanpham WHERE masanpham ='$id' ";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_row($result);
		if (!isset($_SESSION['cart'])) {
			$cart = array();
			$cart[$id] = array(
				'name' => $row[1],
				'num' => 1,
				'price' => $row[4],
				'image' => $row[2]
			);
		}
		else {
			$cart = $_SESSION['cart'];
			if(array_key_exists($id, $cart)) {
				$cart[$id] = array(
				'name' => $row[1],
				'num' => (int)$cart[$id]['num'] + 1,
				'price' => $row[4],
				'image' => $row[2]
				);
			}
			else {
				$cart[$id] = array(
				'name' => $row[1],
				'num' => 1,
				'price' => $row[4],
				'image' => $row[2]
				);
			}
		}
        $_SESSION['cart'] = $cart;
        $total = 0;
        $number = 0;
        foreach($cart as $value) {
            $number += (int)$value['num'];
            number_format($total += (int)$value['num'] * (int)$value['price']);   
        }
        echo $number."-".number_format( $total).' VNĐ';
	} 
?>