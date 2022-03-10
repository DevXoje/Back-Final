<?php

namespace App\Domain\Tienda;

use App\Domain\Tienda\Product\Events\ProductWasCreatedDomainEvent;

final class Product
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
		$user->record(new ProductWasCreatedDomainEvent($id, $name, $password));
		return $user;
	}
	private function record(ProductWasCreatedDomainEvent $event): void
	{
		// $this->events->record($event);
	}
}
