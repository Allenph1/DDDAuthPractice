<?php

	namespace Domain\Aggregate\Person;

	class Person
	{
		private $id;
		private $firstName;
		private $lastName;
		private $creationDate;
		function __construct(Int $id, String $firstName, String $lastName, DateTime $creationDate) {
			$this->id = $id;
			$this->setFirstName($firstName);
			$this->setLastName($lastName);
			$this->creationDate = $creationDate;
		}
		function getId() {
			return $this->id;
		}
		function setFirstName(String $firstName) {
			$this->firstName = $firstName;
		}
		function getFirstName() {
			return $this->firstName;
		}
		function setLastName(String $lastName) {
			$this->lastName = $lastName;
		}
		function getLastName() {
			return $this->lastName;
		}
		function getCreationDate() {
			return $this->creationDate;
		}
	}
