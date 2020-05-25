<?php
/* 
=====================================================================
* Este arquivo é o mais importante, pois ele fica todas as informações de credenciamento do banco
* host = local
* user = login
* pass = senha
* base = nome do banco
* em conn ele testa a conexão com o banco
=======================================================================
*/
	$host = "localhost";
	$user = "root";
	$pass = "";
	$base = "setor";
	
	$conn = new mysqli($host, $user, $pass, $base);
	
	if($conn->connect_error){
		die("Erro: ".$conn->connect_error);
	}
	
?>