<?php

use BoundedContent\User\Domain\Contracts;
use BoundedContent\User\Domain\User;

interface UserRepositoryInterface
{
	public function save(User $user): void;
}
