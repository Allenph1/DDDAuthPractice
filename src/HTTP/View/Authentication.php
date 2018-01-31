<?php

	namespace HTTP\View;

	use Symfony\Component\HttpFoundation\Response;
	use Twig_Environment as Engine;

	class Authentication
	{
		function __construct(Response $response, Engine $engine) {
			$this->response = $response;
			$this->engine = $engine;
		}
		function loginForm() {
			$this->response->setContent($this->engine->render('login.html'));
			return $this->response;
		}
		function attemptLogin() {
			$this->response->setContent($this->engine->render('login.html'));
			return $this->response;
		}
		function loginAttempt() {
			$this->response->setContent();
			return $this->response;
		}
	}
