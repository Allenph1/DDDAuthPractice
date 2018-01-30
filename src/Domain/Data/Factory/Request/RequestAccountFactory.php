<?php

	namespace Domain\Data\Factory\Request;

	use Domain\Aggregate\Account\Account;
  use Domain\Aggregate\Account\PasswordHash;
	use Domain\Interface\Data\Factory\AccountFactory;
	use Symfony\Component\HttpFoundation\Request;

	class RequestAccountFactory implements AccountFactory {
		function create(Request $row) {
			return new Account(
				(Int) $row['id'],
				(Int) $row['ownerPersonId'],
				(String) $row['username'],
				new PasswordHash()->setHash($row['passwordHash']),
				new DateTime($row['creationDate'])
			);
		}
		function createCollection(Request $rows) {
			$collection = [];
			foreach($row as $row) {
				$collection[] = $this->create($row);
			}
			return $collection;
		}
	}
