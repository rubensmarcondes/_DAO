<?php
// CONFIG.PHP importante 

spl_autoload_register(function($class_name){
	
	$filename = "class" . DIRECTORY_SEPARATOR . $class_name . ".php";
	
	// garante que so ira importar uma vez a classe
	// AUTOLOAD
	if(file_exists($filename)){
		require_once($filename);
	}
});


?>