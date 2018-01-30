<?php

	namespace Domain\Data\Factory\MySQL;

	use Domain\Aggregate\Person\Person;
	use Domain\Interface\Data\Factory\PersonFactory;

	class MySQLPersonFactory implements PersonFactory {
		function create(Array $row) {
			return new Person(
				(Int) $row['id'],
				(String) $row['firstName'],
				(String) $row['lastName'],
				new DateTime($row['creationDate'])
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
