<?php

	namespace Domain\Aggregate\Account;

	class PasswordHash
	{
		private $hash = null;
		function setPassword(String $password) {
			$this->hash = password_hash($password, PASSWORD_DEFAULT);
		}
		function verify(String $password) {
			return password_verify($password, $this->getHash());
		}
		function setHash(String $hash) {
			$this->hash = $hash;
		}
		function getHash() {
			return $this->hash;
		}
	}
