<?php

	ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
		
	require_once('eFoli/init.php');


	use eFoli\Mate\Sdk\Init as eSdk;


	//Access Key provided by admin
	$accessKey = '__ACCESS_KEY__';
	//Secret Key provided by admin
	$secretKey = '__SECRET_KEY__';


	//initialize sdk for eFoli api
	$eSdk = new eSdk($accessKey,$secretKey);
	

	//Get the order service for order api
	$orderService = $eSdk->getService()->Order;



?>