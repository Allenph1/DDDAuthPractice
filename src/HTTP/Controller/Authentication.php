<?php

	namespace HTTP\Controller;

	use Domain\Service\HTTP\HTTPAuthenticationService;

	class Authentication
	{
		function __construct(HTTPAuthenticationService $authenticationService) {
			$this->authenticationService = $authenticationService;
		}
		function loginForm() {
			return;
		}
		function attemptLogin() {
			$this->authenticationService->login();
		}
		function loginSuccess() {
			return;
		}
		function logout() {
			$this->authenticationService->logout();
		}
	}
