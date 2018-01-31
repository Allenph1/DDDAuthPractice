<?php

	namespace Domain\Service\HTTP;

	use Symfony\Component\HttpFoundation\Request;
	use Domain\Data\Repository\AccountRepository;
	use Domain\Data\Repository\PersonRepository;

	class HTTPAuthenticationService
	{
		function __construct(Request $request, AccountRepository $accountRepository, PersonRepository $personRepository) {
			$this->request = $request;
			$this->repositories = (object) [];
			$this->repositories->accountRepository = $accountRepository;
			$this->repositories->personRepository = $personRepository;
		}
		function login() {
			$account = $this->repositories->accountRepository->getByUsername($this->request->request->get("username"));
			if ($account->getPassword()->verify($this->request->request->get('password'))) {
				$_SESSION['accountId'] = $account->getId();
			}
		}
		function logout() {
			session_destroy();
		}
		function authenticateSession() {
			return;
		}
	}
