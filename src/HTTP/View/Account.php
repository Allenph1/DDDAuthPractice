<?php

	namespace HTTP\View;

	use Symfony\Component\HttpFoundation\Response;
	use Twig_Environment as Engine;

	class Account
	{
		function __construct(Response $response, Engine $engine) {
			$this->response = $response;
			$this->engine = $engine;
		}
		function registerForm() {
			$this->response->setContent($this->engine->render('Account/Register.html'));
			return $this->response;
		}
		function attemptRegistration() {
			$this->response->setContent($this->engine->render('Account/Register.html'));
			return $this->response;
		}
    function succesfulRegistration() {
      $this->response->setContent($this->engine->render('Account/SuccesfulRegistration.html'));
			return $this->response;
		}
	}
