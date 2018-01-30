<?php

  namespace Domain\Data\Repository;

  use \Domain\Component\Repository;

  class PersonRepository extends Repository
  {
		function insert(Person $person) {
			$this->dataMapper->insert($person);
		}
    function getById(Int $id) {
      $person = $this->factory->create(
        $this->dataMapper->getById($id)
      );
      $this->idCache[$person->id] = $person;
      return $person;
    }
    function update(Person $person) {
      $this->dataMapper->update($person);
    }
    function deleteById(Person $person) {
      $this->dataMapper->deleteById($person);
    }
  }
