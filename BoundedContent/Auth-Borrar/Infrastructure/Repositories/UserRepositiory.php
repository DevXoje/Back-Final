<?php

declare(strict_types=1);

namespace BoundedContent\User\Infrastructure\Repositories;

use BoundedContent\User\Domain\User;
use BoundedContent\User\Domain\ValueObjects\UserId;

interface UserRepository
{
	public function save(User $user): void;
	public function search(UserId $id): ?User;
}
