<?php

  namespace Domain\Interface\Data\DataMapper;

  interface PersonDataMapper {
    function insert(Person $person) {}
    function getById(Int $id) {}
    function update(Person $person) {}
    function deleteById(Person $person) {}
  }
