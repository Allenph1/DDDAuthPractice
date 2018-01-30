<?php

  namespace Domain\Component;

  class Repository
  {
    private $idCache = [];
    private $dataMapper;
    function __construct(DataMapper $dataMapper) {
      $this->dataMapper = $dataMapper;
    }
  }
