<?php

namespace BoundedContent\User\Domain\ValueObjects;

class UserName
{
	private string $value;
	public function __construct(string $value)
	{
		$this->value = $value;
	}
	public function value(): string
	{
		return $this->value;
	}
}
