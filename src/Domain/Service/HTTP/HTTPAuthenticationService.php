<?php

	namespace Domain\Service\HTTP;

	use Symfony\Component\HttpFoundation\Request;
	use \Domain\Data\Repository\AccountRepository;
	use \Domain\Data\Repository\PersonRepository;

	class HTTPAuthenticationService
	{
		function __construct(Request $request, AccountRepository $accountRepository, PersonRepository $personRepository) {
			$this->request = $request;
			$this->accountRepository = $accountRepository;
			$this->personRepository = $personRepository;
		}
		function login() {
			print_r($this->request->request->get("username"));
			$account = $this->accountRepository->getByUsername($this->request->request->get("username"));
			if ($account->password->verify($this->request->request->password)) {
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
