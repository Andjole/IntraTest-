<?php
Class Cart{
	public $subtotal;
	public $order_number;
	public $product_list;
	private $occurrence;
	public $price=array("a" => 1.50,"f" => 3.00, "d" => 1.00, "m" => 2.50);
	
	public function get_subtotal(){		
		return $this->subtotal;
	}
	public function get_order_number(){
		return $this->order_number;
	}
	public function show_arr($arr, $type, $vis){
		foreach($arr as $k=>$v){
			if($vis==1){
				echo $k." ".$v.$type."<br>";			
			}else{
				echo $v." ";			
			}
		}
	}
	public function get_product_list(){
		return $this->product_list;		
	}
	public function set_subtotal(){	
		$occurrence=array_count_values($this->product_list);
		foreach($occurrence as $k=>$v){
			$q=$this->discount($v);
			$this->subtotal+=$q*$this->price[$k];
		}
	}
	public function set_order_number($order){
		$this->order_number=$order;		
	}
	public function set_product_list($list){
		$this->product_list=$list;		
	}
	public function discount($product){
		$q=floor ($product/3);
		return $product-$q;
	}
}
$myCart=new Cart;
$myCart->set_order_number(1);

$myCart->set_product_list(array("a", "f", "d", "a", "d", "f", "m", "f", "a", "f",  "m", "f", "f"));
$myCart->set_subtotal();
echo "<b>Product price</b><br>";
$myCart->show_arr($myCart->price, "&euro;", "1");
echo "<b>Order numer: </b>".$myCart->get_order_number()."<br>";
echo "<b>List: </b>";
$myCart->show_arr($myCart->product_list, "", "2");
echo "<br><b>Total: </b>".$myCart->get_subtotal()."&euro;";

?>