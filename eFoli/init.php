<?php

/*
-     Project       :   eFoli
-     Purpose       :   init of eFoli 
-
-     Code ID       :   SONKIT_PRAN.ME_0001
-
-     Create Date   :   2019-12-07 16:32:24
-     Modify Date   :   2019-12-29 18:04:52
-
-     Author        :   Pran Krishna Paul, pran.me
-
-     This code is CONFIDENTIAL, protected by eFoli.com
-     This program or code or part of code should not be stored, copied, modified or transferred 
-     without explicit written permission of the Disclosure.
-
-     Copyright (c) eFoli, Powered by - efoli.com
-
*///-------------------------------------------------------------------------------------------------------|


	
	namespace eFoli;

	
	define("__ROOT_DIR__",dirname(dirname(__FILE__)));	
	include_once __DIR__.'/Pate/init.php';





	function credentials()
	{		
		$out = "Name : Pran Krishna Paul \r\n";
		$out .= "Email  : pran@efoli.com \r\n";
		$out .= "Company : eFoli \r\n";

		return $out;
	}





?>
