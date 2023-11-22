<?php

	session_start();
	require 'database.php';

	spl_autoload_register(
		function($class){
			require_once $class.".php";
		}
	);

?>