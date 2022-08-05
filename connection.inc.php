<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ecom');
define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'].'/e-commerce/');
define('SITE_PATH', 'http://localhost/e-commerce/');
define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH.'media/product/');
?>