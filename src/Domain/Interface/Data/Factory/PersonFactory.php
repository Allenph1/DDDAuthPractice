<?php

	namespace Domain\Interface\Data\Factory;

	interface PersonFactory
	{
		function create(Array $data) {};
		function createCollection(Array $data) {};
	}
