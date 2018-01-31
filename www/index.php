<?php

	error_reporting(-1);
	ini_set('display_errors', 'On');

	session_start();

	require_once("../vendor/autoload.php");
	require_once("../src/Bootstrap/DIC.php");
	require_once("../src/Bootstrap/Router.php");
