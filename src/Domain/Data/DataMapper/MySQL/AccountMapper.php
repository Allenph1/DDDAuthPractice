<?php

	namespace Domain\Data\DataMapper\MySQL;

	use \Domain\Aggregate\Account\Account;
	use \Domain\Component\MySQLDataMapper;
	use \Domain\Interface\Data\DataMapper\AccountDataMapper;
	use \Domain\Interface\Data\Factory\AccountFactory;

	class AccountMapper extends DataMapper implements AccountDataMapper
	{
		private $connection;
		private $table;
		function __construct(PDO $connection, String $table, AccountFactory $factory) {
			$this->connection = $connection;
			$this->table = $table;
			$this->factory = $factory;
		}
		function insert(Account $account) {
			$sql = "INSERT INTO {$this->getTable()}
						  (id, ownerPersonId, password, username, creationDate)
							VALUES
							(:id, :ownerPersonId, :password, username, :creationDate)
							";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":id", $account->getId());
			$statement->bindValue(":ownerPersonId", $account->getOwnerPersonId());
			$statement->bindValue(":password", $account->getPassword()->getHash());
			$statement->bindValue(":username", $account->getUsername());
			$statement->bindValue(":creationDate", $account->getCreationDate());
			$statement->execute();
		}
		function getByPersonId(Int $personId) {
			$sql = "SELECT * FROM {$this->getTable()} WHERE ownerPersonId = :ownerPersonId";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":ownerPersonId", $personId);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if ($data) {
				return $this->getFactory()->create($data);
			}
		}
		function getByUsername(String $username) {
			$sql = "SELECT * FROM {$this->getTable()} WHERE username = :username";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":username", $username);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if ($data) {
				return $this->getFactory()->create($data);
			}
		}
		function update(Account $account) {
			$sql = "UPDATE {$this->getTable()}
							SET ownerPersonId = :ownerPersonId,
									password = :password,
									username = :username,
									creationDate = :creationDate
							WHERE id = :id";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":ownerPersonId", $account->getOwnerPersonId());
			$statement->bindValue(":password", $account->getPassword()->getHash());
			$statement->bindValue(":username", $account->getUsername());
			$statement->bindValue(":creationDate", $account->getCreationDate());
			$statement->bindValue(":id", $account->getId());
			$statement->execute();
		}
		function deleteById(Account $account) {
			$sql = "DELETE FROM {$this->getTable()} WHERE id = :id";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":id", $account->getId());
			$statement->execute();
		}
		protected function getConnection() {
			return $this->connection;
		}
		protected function getTable() {
			return $this->table;
		}
		protected function getFactory() {
			return $this->factory;
		}
	}
