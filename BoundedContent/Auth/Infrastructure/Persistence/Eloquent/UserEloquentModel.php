<?php

declare(strict_types=1);

namespace BoundedContent\User\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

final class UserEloquentModel extends Model
{
	protected $table = "users";
	protected $primaryKey = "id";
	public $incrementing = false;
	protected $keyType = "string";
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'id',
		'name',
		'password',
	];
	/*














	use HasFactory;


	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array
	 *
	 * protected $hidden = [
	 *	'password',
	 *	'remember_token',
	 *];
	 *

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 *
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public int $id;
	public string $name;
	public string $password;
	public function __construct()
	{
	}
	public function name(): UserName
	{
		return new UserName($this->name);
	}
	public function id(): UserId
	{
		return new UserId($this->id);
	}
	public function password(): UserPassword
	{
		return new UserPassword($this->password);
	} */
}



/*
final class User extends Model
{
	use HasFactory;
 *
	protected $table = "users";
	public function __construct(){}
	public static function create(UserId $id, UserName $name, UserPassword $password): self
	{$user = new self($id, $name, $password);
		$user->record(new UserWasCreatedDomainEvent($id->value(), $name->value(), $password->value()));
		return $user;}
} */
