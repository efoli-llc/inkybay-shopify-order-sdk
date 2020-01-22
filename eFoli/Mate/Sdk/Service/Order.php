<?php

/*
-     Project       :   api.inkybay.com
-     Purpose       :   Order Service on Mate Sdk
-
-     Code ID       :   EFLP04-10000001
-
-     Create Date   :   2020-01-09 10:13:29
-     Modify Date   :   2020-01-19 13:50:59
-
-     Author        :   Pran Krishna Paul - pran.me, Pran Krishna Paul - pran.me, eFoli
-     Last Modifier :   Pran Krishna Paul - pran.me
-     Editor        :   Pran Krishna Paul - pran.me
-
-     This code is CONFIDENTIAL, protected by an NDA of eFoli.
-     This program or code or part of code should not be stored, copied, modified or transferred 
-     without explicit written permission of the Disclosure.
-
-     Copyright (c) eFoli.com, Powered by - eFoli LLC
-
--------------------------------------------------------------------------------------------*///|



namespace eFoli\Mate\Sdk\Service;


#	A class for Sdk Front Door
class Order{
	

	private $_service_name = 'order';
	private $_service_endpoint = 'https://api.inkybay.com/shopify/order';
	private $_out_formats = array('json','xml');
	private $_action;

	function __construct($act){
		$this->_action = $act;
	}


	
	public function getOrder($oid='',$fmt='json',$params=array()){
		$this->_action->setHeaders('get',$this->_service_name,'default');
		$action_url = $this->_service_endpoint.'/'.$oid.'.'.$fmt;
		$data = $this->_action->get($action_url,$params,$fmt);
		return $data->body;
	}

	public function getOrderItem($oid='',$itmId='',$fmt='json',$params=array()){
		$this->_action->setHeaders('get',$this->_service_name,'item');
		$action_url = $this->_service_endpoint.'/item'.'/'.$oid.'_'.$itmId.'.'.$fmt;
		$data = $this->_action->get($action_url,$params,$fmt);
		return $data->body;
	}






#	End of class
}


?>