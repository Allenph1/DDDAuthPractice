<?php

  namespace Domain\Contract\Data\DataMapper;

  use Domain\Aggregate\Account\Account;

  interface AccountDataMapper {
    function insert(Account $account);
    function getByPersonId(String $id);
    function getByUsername(String $username);
    function update(Account $account);
    function deleteById(Account $account);
  }
