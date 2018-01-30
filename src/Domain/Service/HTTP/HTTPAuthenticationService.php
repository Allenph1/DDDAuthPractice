<?php

	namespace Domain\Service;

	use Symfony\Component\HttpFoundation\Request;
	use \Domain\Repository\AccountRepository;
	use \Domain\Repository\PersonRepository;

	class HTTPAuthenticationService
	{
		function __construct(Request $request, AccountRepository $accountRepository, PersonRepository $personRepository) {
			$this->request = $request;
			$this->accountRepository = $accountRepository;
			$this->personRepository = $personRepository;
		}
		function login() {
			$account = $this->accountRepository->getByUsername($this->request->userame);
			if ($account->password->verify($this->request->password)) {
				$_SESSION['accountId'] = $account->id;
				echo "LOGGED IN!";
			}
		}
		function logout() {
			session_destroy();
			echo "LOGGED OUT!";
		}
		function authenticateSession() {
			return;
		}
	}
