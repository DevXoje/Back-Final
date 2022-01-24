<?php

namespace BoundedContent\User\Domain\Events;

use BoundedContent\User\Domain\User;
use BoundedContent\User\Domain\ValueObjects\{UserId, UserName, UserPassword};

class UserWasCreatedDomainEvent
{
	private $user;

	public function __construct(int $id, string $name, string $password)
	{
		$this->user = new User(new UserId($id), new UserName($name), new UserPassword($password));
	}

	public function user()
	{
		return $this->user;
	}
}
