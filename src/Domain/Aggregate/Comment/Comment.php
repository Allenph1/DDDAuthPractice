<?php

	namespace Domain\Aggregate\Comment;

	class Comment
	{
		private $id;
		private $authorPersonId;
		private $content;
		private $creationDate;
		function __construct(Int $id, Int $authorPersonId, Int $postId, DateTime $creationDate, String $content) {
			$this->id = $id;
			$this->authorPersonId = $authorPersonId;
			$this->postId = $postId;
			$this->setContent($content);
			$this->creationDate = $creationDate;
		}
		function getId() {
			return $this->id;
		}
		function getAuthor() {
			return $this->authorPersonId;
		}
		function getCreationDate() {
			return $this->creationDate;
		}
		function setContent(String $content) {
			$this->content = $content;
		}
		function getContent() {
			return $this->content;
		}
	}
