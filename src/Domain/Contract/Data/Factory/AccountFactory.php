<?php

	namespace Domain\Contract\Data\Factory;

	interface AccountFactory
	{
		function create(Array $data);
		function createCollection(Array $data);
	}
