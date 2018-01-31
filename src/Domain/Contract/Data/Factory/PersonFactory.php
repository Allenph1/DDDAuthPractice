<?php

	namespace Domain\Contract\Data\Factory;

	interface PersonFactory
	{
		function create(Array $data);
		function createCollection(Array $data);
	}
