<?php

  namespace Domain\Data\Repository;

  use Domain\Contract\Data\DataMapper\PersonDataMapper;
  use Domain\Aggregate\Person\Person;

  class PersonRepository
  {
    private $idCache = [];
    function __construct(PersonDataMapper $dataMapper) {
      $this->dataMapper = $dataMapper;
    }
		function insert(Person $person) {
			$this->dataMapper->insert($person);
		}
    function getById(String $id) {
      $person = $this->dataMapper->getById($id);
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
