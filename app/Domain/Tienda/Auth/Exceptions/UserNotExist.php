<?php

declare(strict_types=1);

namespace App\Domain\Tienda\Auth\Exceptions;

use App\Domain\Shared\DomainError;

final class UserNotExist extends DomainError
{
	public function __construct(int $id)
	{
		parent::__construct();
	}

	public function errorCode(): string
	{
		return 'User_not_exist';
	}

	protected function errorMessage(): string
	{
		return sprintf('The User <%s> does not exist', $this->id);
	}
}
