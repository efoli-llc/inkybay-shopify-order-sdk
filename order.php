<?php

	include 'conf.php';


	//	Get full order details	
	
	//	Param 1 : Order Id : You will get it from where your hook url pointed. and will get it by $_GET['orderId'] 
	//	Param 2 : Output format 'json' or 'xml'
	$data = $orderService->getOrder('orderId','json');

	

	//	Print Output

	//For xml
	//header('Content-type: text/xml');
	//echo $data;
	
	//For json
	header('Content-type: application/json');
	echo $data;






?>