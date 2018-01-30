<?php

	namespace Domain\Component;

	class DataMapper
	{
		protected function mergeData($entity, $data) {
			if (is_array($data)) {
				$data = (object) $data;
			}
			foreach($data as $key => $value) {
				$entity->$key = $value;
			}
		}
	}
