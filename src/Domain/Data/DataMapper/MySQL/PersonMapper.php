<?php

	namespace Domain\Data\DataMapper\MySQL;

	use Domain\Aggregate\Person\Person;
	use Domain\Component\MySQLDataMapper;
	use Domain\Contract\Data\DataMapper\PersonDataMapper;
	use Domain\Contract\Data\Factory\PersonFactory;

	class PersonMapper implements PersonDataMapper
	{
		private $connection;
		private $table = "person";
		function __construct(\PDO $connection, PersonFactory $factory) {
			$this->connection = $connection;
			$this->factory = $factory;
		}
		function insert(Person $person) {
			$sql = "INSERT INTO {$this->getTable()}
						  (id, firstName, lastName, creationDate)
							VALUES
							(:id, :firstName, :lastName, :creationDate)
							";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":id", $person->getId());
			$statement->bindValue(":firstName", $person->getFirstName());
			$statement->bindValue(":lastName", $person->getlastName());
			$statement->bindValue(":creationDate", $person->getCreationDate()->format("Y-m-d H:i:s"));
			$statement->execute();
		}
		function getById(String $id) {
			$sql = "SELECT * FROM {$this->getTable()} WHERE id = :id";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":id", $id);
			$statement->execute;
			$data = $statement->fetch(\PDO::FETCH_ASSOC);
			if ($data) {
				return $this->getFactory()->create($data);
			}
		}
		function update(Person $person) {
			$sql = "UPDATE {$this->getTable()}
							SET firstName = :firstName,
									lastName = :lastName,
									creationDate = :creationDate
							WHERE id = :id";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":firstName", $person->getFirstName());
			$statement->bindValue(":lastName", $person->getLastName());
			$statement->bindValue(":creationDate", $person->getCreationDate()->format("Y-m-d H:i:s"));
			$statement->bindValue(":id", $person->getId());
			$statement->execute();
		}
		function deleteById(Person $person) {
			$sql = "DELETE FROM {$this->getTable()} WHERE id = :id";
			$statement = $this->getConnection()->prepare($sql);
			$statement->bindValue(":id", $person->getId());
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
