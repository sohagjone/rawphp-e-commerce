<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}
function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con, $str){
	if($str!=''){
		$str = trim($str);
		return mysqli_real_escape_string($con, $str);
	}
	
}

function productSoldQtyByProductId($con, $pid){

	$sql = "SELECT SUM(order_detail.qty) as qty FROM order_detail, `order` WHERE `order`.id = order_detail.order_id AND order_detail.product_id=$pid AND `order`.order_status!=4";
	
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($res);
	return $row['qty'];
}

function productQty($con, $pid){

	$sql = "SELECT qty FROM product WHERE id='$pid'";
	
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($res);
	return $row['qty'];
}
?>