<?php

	
	include 'conf.php';


	//	Get an order item details
	
	//	Param 1 : Order Id : You will get it from where your hook url pointed. and will get it by $_GET['orderId'] 
	//	Param 2 : Item Id : You will get it from where your hook url pointed. and will get it by $_GET['itemId']
	//	Param 3 : Output format 'json' or 'xml'
	$data = $orderService->getOrderItem('orderId','itemId','json');

	



	//	Print Output

	//For xml
	//header('Content-type: text/xml');
	//echo $data;
	
	//For json
	header('Content-type: application/json');
	echo $data;




?>