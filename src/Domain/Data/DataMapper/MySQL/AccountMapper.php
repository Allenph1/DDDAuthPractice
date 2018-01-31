<?php

	namespace Domain\Data\DataMapper\MySQL;

	use Domain\Aggregate\Account\Account;
	use Domain\Component\MySQLDataMapper;
	use Domain\Contract\Data\DataMapper\AccountDataMapper;
	use Domain\Contract\Data\Factory\AccountFactory;

	class AccountMapper implements AccountDataMapper
	{
		private $connection;
		private $table = "account";
		function __construct(\PDO $connection, AccountFactory $factory) {
			$this->connection = $connection;
			$this->factory = $factory;
		}
		function insert(Account $account) {
			$sql = "INSERT INTO {$this->getTable()}
						  (id, ownerPersonId, passwordHash, username, creationDate)
							VALUES
							(:id, :ownerPersonId, :passwordHash, :username, :creationDate)
							";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":id", $account->getId());
			$statement->bindValue(":ownerPersonId", $account->getOwnerPersonId());
			$statement->bindValue(":passwordHash", $account->getPassword()->getHash());
			$statement->bindValue(":username", $account->getUsername());
			$statement->bindValue(":creationDate", $account->getCreationDate()->format("Y-m-d H:i:s"));
			$statement->execute();
			var_dump($statement->errorInfo());
		}
		function getByPersonId(String $personId) {
			$sql = "SELECT * FROM {$this->getTable()} WHERE ownerPersonId = :ownerPersonId";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":ownerPersonId", $personId);
			$statement->execute();
			$data = $statement->fetch(\PDO::FETCH_ASSOC);
			if ($data) {
				return $this->getFactory()->create($data);
			}
		}
		function getByUsername(String $username) {
			$sql = "SELECT * FROM {$this->getTable()} WHERE username = :username";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":username", $username);
			$statement->execute();
			$data = $statement->fetch(\PDO::FETCH_ASSOC);
			if ($data) {
				return $this->getFactory()->create($data);
			}
		}
		function update(Account $account) {
			$sql = "UPDATE {$this->getTable()}
							SET ownerPersonId = :ownerPersonId,
									passwordHash = :passwordHash,
									username = :username,
									creationDate = :creationDate
							WHERE id = :id";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":ownerPersonId", $account->getOwnerPersonId());
			$statement->bindValue(":passwordHash", $account->getPassword()->getHash());
			$statement->bindValue(":username", $account->getUsername());
			$statement->bindValue(":creationDate", $account->getCreationDate()->format("Y-m-d H:i:s"));
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
