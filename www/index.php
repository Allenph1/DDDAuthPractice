<?php

	session_start();

	require_once("../vendor/autoload.php");

	new \Domain\Service\HTTPAuthenticationService(T);
	require_once("../src/Bootstrap/Router.php");
	require_once("../src/Bootstrap/DIC.php");
