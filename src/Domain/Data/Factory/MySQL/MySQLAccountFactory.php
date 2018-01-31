<?php

	namespace Domain\Data\Factory\MySQL;

	use Domain\Aggregate\Account\Account;
  use Domain\Aggregate\Account\PasswordHash;
	use Domain\Contract\Data\Factory\AccountFactory;

	class MySQLAccountFactory implements AccountFactory {
		function create(Array $row) {
			$passwordHash = new PasswordHash();
			$passwordHash->setHash($row['passwordHash']);
			return new Account(
				(String) $row['id'],
				(Int) $row['ownerPersonId'],
				(String) $row['username'],
				$passwordHash,
				new \DateTime($row['creationDate'])
			);
		}
		function createCollection(Array $rows) {
			$collection = [];
			foreach($row as $row) {
				$collection[] = $this->create($row);
			}
			return $collection;
		}
	}
