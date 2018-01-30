<?php

	namespace Domain\Aggregate;

	use Domain\Comment\CommentCollection;

	class Post
	{
		private $id;
		private $authorPersonId;
		private $content;
		private $creationDate;
		function __construct(Int $id, Int $authorPersonId, String $content, DateTime $creationDate) {
			$this->id = $id;
			$this->authorPersonId = $authorPersonId;
			$this->setContent($content);
			$this->creationDate = $creationDate;
		}
		function getId() {
			return $this->id;
		}
		function getauthorPersonId() {
			return $this->authorPersonId;
		}
		function setContent(String $content) {
			$this->content = $content;
		}
		function getContent() {
			return $this->content;
		}
		function getCreationDate() {
			return $this->creationDate;
		}
	}
