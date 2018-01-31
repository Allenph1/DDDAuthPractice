<?php

	namespace Domain\Data\Factory\MySQL;

	use Domain\Aggregate\Person\Person;
	use Domain\Contract\Data\Factory\PersonFactory;

	class MySQLPersonFactory implements PersonFactory {
		function create(Array $row) {
			return new Person(
				(String) $row['id'],
				(String) $row['firstName'],
				(String) $row['lastName'],
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
