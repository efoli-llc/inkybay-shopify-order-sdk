<?php

/*
-     Project       :   api.inkybay.com
-     Purpose       :   Init Sdk on eFoli Mate
-
-     Code ID       :   EFLP04-10000001
-
-     Create Date   :   2020-01-09 10:13:29
-     Modify Date   :   2020-01-19 16:26:08
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



namespace eFoli\Mate\Sdk;


#	A class for Sdk Front Door
class Init{
	

	private $_Services;
	


	function __construct($aKey='',$sKey=''){
		$config = new Config($aKey,$sKey);	
		$Action = new Action($config->configData());	
		$serviceOrder = new Service\Order($Action);
		$this->_Services = (object)array(
				'Order'=> $serviceOrder,
			);

	}


	#	======Public functions start======::>



		public function getService(){
			return $this->_Services;
		}



	#	======Public functions end======..::|




#	End of class
}


?>