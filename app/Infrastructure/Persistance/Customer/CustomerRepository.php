<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistance\Customer;

use App\Domain\Tienda\Customer\Customer;

interface AuthRepository
{
	public function save(Customer $user): void;
	public function search(int $id): ?Customer;
}
