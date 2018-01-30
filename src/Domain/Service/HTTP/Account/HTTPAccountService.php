<?php

	namespace Domain\Service\HTTP\Account;


	use Symfony\Component\HttpFoundation\Request;
	use \Domain\Repository\AccountRepository;
	use \Domain\Repository\PersonRepository;
	use \Domain\Factory\Request\RequestAccountFactory;
	use \Domain\Factory\Request\RequestPersonFactory;

	class HTTPAccountService
	{
		private $repositories;
		function __construct(Request $request, AccountRepository $accountRepository, RequestAccountFactory $requestAccountFactory, PersonRepository $personRepository, RequestPersonFactory $requestPersonFactory ) {
			$this->request = $request;
			$this->repositories = (object) [];
			$this->repositories->account = $accountRepository;
			$this->repositories->person = $personRepository;
			$this->factories->account = $requestAccountFactory;
			$this->factories->person = $personRepository;
		}
		function createAccount() {
			$person = $this->factories->person->create($this->request);
			$account = $this->factories->account->create($this->request);
			$this->repositories->person->insert($person);
			$this->repositories->account->insert($account);
		}
	}
