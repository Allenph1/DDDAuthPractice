<?php

  namespace Domain\Data\Repository;

  use Domain\Contract\Data\DataMapper\AccountDataMapper;
  use Domain\Aggregate\Account\Account;

  class AccountRepository
  {
    private $idCache = [];
    function __construct(AccountDataMapper $dataMapper) {
      $this->dataMapper = $dataMapper;
    }
    function insert(Account $account) {
      $this->dataMapper->insert($account);
    }
    function getByPersonId(String $personId) {
      $account = $this->dataMapper->getByPostId($personId);
      $this->idCache[] = $account;
      return $account;
    }
    function getByUsername(String $username) {
      return $this->dataMapper->getByUsername($username);
    }
    function update(Account $account) {
      $this->dataMapper->update($account);
    }
    function deleteById(Account $account) {
      $this->dataMapper->deleteById($account);
    }
  }
