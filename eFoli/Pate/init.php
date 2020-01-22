<?php


	namespace eFoli\Pate;


	spl_autoload_register(function($className) {
		$className = str_replace("\\", '/', $className);
		include_once __ROOT_DIR__.'/'.$className . '.php';
	
	});







?>
