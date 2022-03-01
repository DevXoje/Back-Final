<?php

declare(strict_types=1);

namespace BoundedContent\User\Domain\Exceptions;

use BoundedContent\User\Domain\ValueObjects\UserId;
use BoundedContent\Shared\DomainError;

final class UserNotExist extends DomainError
{
	public function __construct(private UserId $id)
	{
		parent::__construct();
	}

	public function errorCode(): string
	{
		return 'User_not_exist';
	}

	protected function errorMessage(): string
	{
		return sprintf('The User <%s> does not exist', $this->id->value());
	}
}
