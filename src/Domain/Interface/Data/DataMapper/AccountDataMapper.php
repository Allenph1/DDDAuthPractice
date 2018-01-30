<?php

  namespace Domain\Interface\Data\DataMapper;

  interface AccountDataMapper {
    function insert(Account $account) {}
    function getByPersonId(Int $id) {}
    function getByUsername(String $username) {}
    function update(Account $account) {}
    function deleteById(Account $account) {}
  }
