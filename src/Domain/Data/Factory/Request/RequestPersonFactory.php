<?php

	namespace Domain\Data\Factory\Request;

	use Domain\Aggregate\Person\Person;
	use Domain\Interface\Data\Factory\PersonFactory;
	use Symfony\Component\HttpFoundation\Request;

	class RequestPersonFactory implements PersonFactory {
		function create(Request $row) {
			return new Person(
				(Int) $row['id'],
				(String) $row['firstName'],
				(String) $row['lastName'],
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
