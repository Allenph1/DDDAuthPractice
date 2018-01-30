<?php

	namespace HTTP\Controller;

	use Domain\Service\HTTP\HTTPAuthenticationService;

	class AuthenticationController
	{
		function __construct(HTTPAuthenticationService $authenticationService) {
			$this->authenticationService = $authenticationService;
		}
		function login() {
			$this->authenticationService->login();
		}
		function logout() {
			$this->authenticationService->logout();
		}
	}
