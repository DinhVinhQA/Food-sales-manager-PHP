<?php

class Shopping_Cart {
	var $cart_name;       

	function __construct($name) {
		$this->cart_name = $name;
		$this->items = $_SESSION[$this->cart_name];
	}
	
	
	function setItemQuantity($order_code, $quantity) {
		$this->items[$order_code] = $quantity;
	}
	
	
	function getItems() {
		return $this->items;
	}
	
	
	function hasItems() {
		return (bool) $this->items;
	}
	
	
	function getItemQuantity($order_code) {
		return (int) $this->items[$order_code];
	}
	
	
	function clean() {
		foreach ( $this->items as $order_code=>$quantity ) {
			if ( $quantity < 1 )
				unset($this->items[$order_code]);
		}
	}
	
	
	function save() {
		$this->clean();
		$_SESSION[$this->cart_name] = $this->items;
	}
}

?>