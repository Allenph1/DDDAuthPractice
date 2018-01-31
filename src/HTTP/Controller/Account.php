<?php

	namespace HTTP\Controller;

	use Domain\Service\HTTP\Account\HTTPAccountService;

	class Account
	{
		function __construct(HTTPAccountService $accountService) {
			$this->account = $accountService;
		}
		function registerForm() {
			return;
		}
		function attemptRegistration() {
			$this->account->createAccount();
      header("Location: /registration/success");
		}
    function succesfulRegistration() {
      return;
    }
	}
