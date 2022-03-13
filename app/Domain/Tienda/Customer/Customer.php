<?php

namespace App\Domain\Tienda\Customer;

use App\Domain\Tienda\Customer\Events\CustomerWasCreatedDomainEvent;

final class Customer
{
	/**
	 * The attributes that are mass assignable.
	 * @var string[]
	 *
	 */
	protected $fillable = [
		'name',
		'description',
		'image',
		'price',
	];


	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array
	 */
	protected $hidden = [
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [];


	static $table = "product";

	public function __construct()
	{
		# code...
	}
	public static function create(int $id, string $name, string $password): self
	{
		$user = new self($id, $name, $password);
		$user->record(new CustomerWasCreatedDomainEvent($id, $name, $password));
		return $user;
	}
	private function record(CustomerWasCreatedDomainEvent $event): void
	{
		// $this->events->record($event);
	}
}
