<?php

	use Symfony\Component\HttpFoundation\Request;

	$injector = new Auryn\Injector;

	/////////////////////////
	// Global Dependencies //
	/////////////////////////

	$pdo = new PDO(
		"mysql:dbname=;host=",
		"username",
		"password"
	);
	$request = Request::createFromGlobals();

	////////////////////////////////////
	// Aggregate Agnostic Definitions //
	////////////////////////////////////

	// Services
	$injector->define('Domain\Service\HTTPAuthenticationService', [
		'Symfony\Component\HttpFoundation\Request' => $request
	]);
	$injector->define('Domain\Service\HTTPAccountService', [
		'Symfony\Component\HttpFoundation\Request' => $request
	]);
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

	///////////////////////////////////
	// Account Aggregate Definitions //
	///////////////////////////////////

	// Services

	// Repository
	$injector->define('Domain\Data\Repository\AccountRepository', [
		'Domain\Component\DataMapper' => "Domain\Data\DataMapper\MySQL\AccountMapper"
	]);
	// Data Mappers
	$injector->define('Domain\Data\DataMapper\MySQL\AccountMapper', [
		'PDO' => $pdo,
		"Domain\Interface\Data\Factory\AccountFactory" => "Domain\Data\Factory\MySQL\MySQLAccountFactory",
	]);
	// Factories

	//////////////////////////////////
	// Person Aggregate Definitions //
	//////////////////////////////////

	// Services

	// Repository
	$injector->define('Domain\Data\Repository\PersonRepository', [
		'Domain\Component\DataMapper' => "Domain\Data\DataMapper\MySQL\PersonMapper"
	]);
	// Data Mappers
	$injector->define('Domain\Data\DataMapper\MySQL\PersonMapper', [
		'PDO' => $pdo,
		"Domain\Interface\Data\Factory\PersonFactory" => "Domain\Data\Factory\MySQL\MySQLPersonFactory",
	]);
	// Factories
