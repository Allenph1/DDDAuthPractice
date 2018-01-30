<?php

	namespace Domain\Interface\Data\Factory;

	interface AccountFactory
	{
		function create(Array $data) {};
		function createCollection(Array $data) {};
	}
