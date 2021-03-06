<?php

	namespace Domain\Aggregate\Account;

	use Domain\Aggregate\Account\PasswordHash;

	class Account
	{
		private $id;
		private $ownerPersonId;
		private $username;
		private $passwordHash;
		private $creationDate;
		function __construct(String $id, String $ownerPersonId, String $username, PasswordHash $passwordHash, \DateTime $creationDate) {
			$this->id = $id;
			$this->ownerPersonId = $ownerPersonId;
			$this->passwordHash = $passwordHash;
			$this->creationDate = $creationDate;
			$this->setUsername($username);
		}
		function getId() {
			return $this->id;
		}
		function getOwnerPersonId() {
			return $this->ownerPersonId;
		}
		function getPassword() {
			return $this->passwordHash;
		}
		function setUsername(String $username) {
			$this->username = $username;
		}
		function getUsername() {
			return $this->username;
		}
		function getCreationDate() {
			return $this->creationDate;
		}
	}
