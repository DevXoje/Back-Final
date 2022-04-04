<?php

namespace App\Domain\Tienda\Customer\Events;

use App\Domain\Tienda\Customer;

class CustomerWasCreatedDomainEvent
{
	private $customer;

	public function __construct(int $id, string $name, string $password)
	{
		#$this->customer = new Customer(new UserId($id), new UserName($name), new UserPassword($password));
	}

	public function customer()
	{
		return $this->customer;
	}
}
