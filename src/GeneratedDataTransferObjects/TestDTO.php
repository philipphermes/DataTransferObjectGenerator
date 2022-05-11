<?php

namespace App\GeneratedDataTransferObjects;

class TestDTO 
{
	private string $username;

	public function getUsername(): string
	{
		return $this->username;
	}

	public function setUsername(string $username): self
	{
		$this->username = $username;

		return $this;
	}
}