<?php

namespace App\Domain\Tienda\Auth\Events;

use App\Domain\Tienda\Auth\Auth;

class AuthWasCreatedDomainEvent
{
	private $user;

	public function __construct(int $id, string $name, string $password)
	{
		#$this->user = new Auth(new UserId($id), new UserName($name), new UserPassword($password));
	}

	public function user()
	{
		return $this->user;
	}
}
