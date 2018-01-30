<?php

  namespace Domain\Data\Repository;

  use \Domain\Component\Repository;

  class AccountRepository extends Repository
  {
    function insert(Account $account) {
      $this->dataMapper->insert($account);
    }
    function getByPersonId(Int $personId) {
      $account = $this->factory->create(
        $this->dataMapper->getByPostId($personId)
      );
      $this->idCache[$account->id] = $account;
      return $account;
    }
    function getByUsername(String $username) {
      return $account = $this->factory->create(
        $this->dataMapper->getByUsername($username)
      );
    }
    function update(Account $account) {
      $this->dataMapper->update($account);
    }
    function deleteById(Account $account) {
      $this->dataMapper->deleteById($account);
    }
  }
