<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistance\Auth;

use App\Domain\Tienda\Auth\Auth;

interface UserRepository
{
	public function save(Auth $user): void;
	public function search(int $id): ?Auth;
}
