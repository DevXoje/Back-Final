<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistance\Product;

use App\Domain\Tienda\Product;

interface ProductRepository
{
	public function save(Product $product): void;
	public function search(int $id): ?Product;
}
