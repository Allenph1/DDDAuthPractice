<?php

  namespace Domain\Contract\Data\DataMapper;

  use Domain\Aggregate\Person\Person;

  interface PersonDataMapper {
    function insert(Person $person);
    function getById(String $id);
    function update(Person $person);
    function deleteById(Person $person);
  }
