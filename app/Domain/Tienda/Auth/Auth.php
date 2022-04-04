<?php

namespace App\Domain\Tienda\Auth;

use App\Domain\Tienda\Auth\Events\AuthWasCreatedDomainEvent;

final class Auth
{
	/**
	 * The attributes that are mass assignable.
	 * @var string[]
	 *
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];


	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];


	static $table = "auth";

	public function __construct()
	{
		# code...
	}
	public static function create(int $id, string $name, string $password): self
	{
		$user = new self($id, $name, $password);
		$user->record(new AuthWasCreatedDomainEvent($id, $name, $password));
		return $user;
	}
	private function record(AuthWasCreatedDomainEvent $event): void
	{
		// $this->events->record($event);
	}
}
