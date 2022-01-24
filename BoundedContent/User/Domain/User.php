<?php

namespace BoundedContent\User\Domain;

use BoundedContent\User\Domain\Events\UserWasCreatedDomainEvent;
use BoundedContent\User\Domain\ValueObjects\{UserId, UserName, UserPassword};

final class User
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


	protected $table = "users";

	public function __construct()
	{
		# code...
	}
	public static function create(UserId $id, UserName $name, UserPassword $password): self
	{
		$user = new self($id, $name, $password);
		$user->record(new UserWasCreatedDomainEvent($id->value(), $name->value(), $password->value()));
		return $user;
	}
	private function record(UserWasCreatedDomainEvent $event): void
	{
		// $this->events->record($event);
	}
}
