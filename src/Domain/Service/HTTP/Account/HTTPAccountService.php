<?php

	namespace Domain\Service\HTTP\Account;


	use Symfony\Component\HttpFoundation\Request;
	use Domain\Data\Repository\AccountRepository;
	use Domain\Data\Repository\PersonRepository;
	use Domain\Aggregate\Account\Account;
	use Domain\Aggregate\Account\PasswordHash;
	use Domain\Aggregate\Person\Person;
	use Ramsey\Uuid\Uuid;

	class HTTPAccountService
	{
		private $repositories;
		function __construct(Request $request, AccountRepository $accountRepository, PersonRepository $personRepository) {
			$this->request = $request;
			$this->repositories = (object) [];
			$this->repositories->account = $accountRepository;
			$this->repositories->person = $personRepository;
		}
		function createAccount() {
			$person = new Person(
				Uuid::uuid1(),
				$this->request->request->get('firstName'),
				$this->request->request->get('lastName'),
				new \DateTime()
			);
			$passwordHash = new PasswordHash();
			$passwordHash->setPassword($this->request->request->get("password"));
			$account = new Account(
				Uuid::uuid1(),
				$person->getId(),
				$this->request->request->get('username'),
				$passwordHash,
				new \DateTime()
			);
			$this->repositories->person->insert($person);
			$this->repositories->account->insert($account);
		}
	}
