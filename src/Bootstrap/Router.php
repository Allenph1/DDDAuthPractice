<?php

	$dispatcher = \FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {

		// Authentication Routes
		$router->addRoute('GET', '/login', 'HTTP\Controller\AuthenticationController/login');
		$router->addRoute('GET', '/logout', 'HTTP\Controller\AuthenticationController/logout');

		// Account Routes

	});

	$httpMethod = $_SERVER['REQUEST_METHOD'];
	$uri = $_SERVER["REQUEST_URI"];

	// Strip query string (?foo=bar) and decode URI
	if (false !== $pos = strpos($uri, '?')) {
	    $uri = substr($uri, 0, $pos);
	}
	$uri = rawurldecode($uri);

	$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

	global $injector; // Instantiated in DIC bootstrap.

	switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        break;
    case FastRoute\Dispatcher::FOUND:
		case FastRoute\Dispatcher::FOUND:
				$handler = $routeInfo[1];
				list($class, $method) = explode("/", $handler, 2);
				$injector->make($class)->$method();
				break;
	}
