<?php

namespace App\Domain\Tienda\Product\Events;

use App\Domain\Tienda\Product;
use BoundedContent\User\Domain\ValueObjects\{UserId, UserName, UserPassword};

class ProductWasCreatedDomainEvent
{
	private $product;

	public function __construct(int $id, string $name, string $password)
	{
		#$this->product = new Product(new UserId($id), new UserName($name), new UserPassword($password));
	}

	public function product()
	{
		return $this->product;
	}
}
