<?php

	$injector = new Auryn\Injector;

	/////////////////////////
	// Global Dependencies //
	/////////////////////////

	$request = Symfony\Component\HttpFoundation\Request::createFromGlobals();

	////////////////////////////////////
	// Aggregate Agnostic Definitions //
	////////////////////////////////////

	// Services

	// Repository

	// DataMappers

	// Factories

	// Misc.
	$injector->alias("Twig_LoaderInterface", "Twig_Loader_Filesystem");
	$injector->define("Twig_Loader_Filesystem", [
		'../src/HTTP/View/Template'
	]);
	$injector->define("Twig_Environment", [
		"Twig_LoaderInterface" => "Twig\Loader\FilesystemLoader"
	]);
	$injector->define('PDO', [
    'mysql:dbname=authentication;host=localhost',
	  'user',
    'password'
	]);
	$injector->define("Symfony\Component\HttpFoundation\Request", [
		$_GET,
    $_POST,
    array(),
    $_COOKIE,
    $_FILES,
    $_SERVER
	]);

	///////////////////////////////////
	// Account Aggregate Definitions //
	///////////////////////////////////

	// Services

	// Repository

	// Data Mappers
	$injector->alias('Domain\Contract\Data\DataMapper\AccountDataMapper', 'Domain\Data\DataMapper\MySQL\AccountMapper');
	// Factories
	$injector->alias("Domain\Contract\Data\Factory\AccountFactory", "Domain\Data\Factory\MySQL\MySQLAccountFactory");

	//////////////////////////////////
	// Person Aggregate Definitions //
	//////////////////////////////////

	// Services

	// Repository

	// Data Mappers
	$injector->alias('Domain\Contract\Data\DataMapper\PersonDataMapper', 'Domain\Data\DataMapper\MySQL\PersonMapper');
	// Factories
	$injector->alias("Domain\Contract\Data\Factory\PersonFactory", "Domain\Data\Factory\MySQL\MySQLPersonFactory");
