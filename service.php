<?php

	include_once("includes.php");

	$opcao = $_POST["servico"];
	
	if ( $opcao ) {
		$opcao = "service/"."$opcao".".php" ;	
		include( $opcao );		
	}

?>