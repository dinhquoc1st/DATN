<?php

namespace App;
class Cart{
	public $products = null;
	public $totalPrice = 0;
	public $totalQuanty = 0;

	public function __construct($cart){
		if($cart){
			$this->products = $cart->products;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQuanty = $cart->totalQuanty;
		}
	}
	public function AddCart($products, $id){
		$newProducts = ['quanty' => 0,'price' => $products->dongia, 'productsInfo' => $products];
		if($this->products){
			if(array_key_exists($id, $this->products)){
				$newProducts = $this->products[$id];
			}

		}
		$newProducts['quanty']++;
		$newProducts['price'] = $newProducts['quanty'] * $products->dongia;
		$this->products[$id] = $newProducts;
		$this->totalPrice += $products->dongia;
		$this->totalQuanty++;
		
	}
	public function DeleteCart($id){
		$this->totalQuanty -= $this->products[$id]['quanty'];
		$this->totalPrice -= $this->products[$id]['price'];
		unset($this->products[$id]);

	}
	public function UpdateCart($id,$quanty){
		$this->totalQuanty -= $this->products[$id]['quanty'];
		$this->totalPrice -= $this->products[$id]['price'];

		$this->products[$id]['quanty'] = $quanty;
		$this->products[$id]['price'] = $quanty * $this->products[$id]['productsInfo']->dongia;

		$this->totalQuanty += $this->products[$id]['quanty'];
		$this->totalPrice += $this->products[$id]['price'];


	}
	
}


?>