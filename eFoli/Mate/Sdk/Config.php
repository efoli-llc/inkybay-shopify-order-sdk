<?php

/*
-     Project       :   api.inkybay.com
-     Purpose       :   Config Sdk on eFoli Mate
-
-     Code ID       :   EFLP04-10000001
-
-     Create Date   :   2020-01-09 10:13:29
-     Modify Date   :   2020-01-19 16:00:58
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


#	A class for Sdk Configuration
class Config{
	


	private static $accessKey = '';
	private static $secretKey = '';
 

	function __construct($aKey='',$sKey=''){
		if($aKey!='' && $sKey!=''){
			self::$accessKey = $aKey;
			self::$secretKey = $sKey;
		}		
	}

	

	public function configData(){
		return (object) array(
			'accessKey'=>self::$accessKey,
			'secretKey'=>self::$secretKey,
		);
	}

#	End of class
}


?>