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
			$this->response->setContent($this->engine->render('Authentication/Login.html'));
			return $this->response;
		}
		function attemptLogin() {
			return $this->response;
		}
		function loginSuccess() {
			$this->response->setContent($this->engine->render("Authentication/LoginSuccess.html"));
			return $this->response;
		}
		function logout() {
			$this->response->setContent($this->engine->render("Authentication/Logout.html"));
			return $this->response;
		}
	}
