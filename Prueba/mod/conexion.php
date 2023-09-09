<?php

$host = "localhost";
	$user = "root";
	$password = "";
	$bdatos = "alugama_blanca";

    $cnxn = mysqli_connect($host,$user,$password);
	$db = mysqli_select_db($cnxn, $bdatos);

    if (mysqli_connect_errno()) {
        $Conectado = false;
    } else {
		mysqli_set_charset($cnxn,"utf8");
		$Conectado = true;
	}