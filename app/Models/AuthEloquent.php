<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class AuthEloquent extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'auth';

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];


	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	public function __construct()
	{
		# code...
	}
	public static function create(int $id, string $name, string $password): self
	{
		$user = new self($id, $name, $password);
		//$user->record(new UserWasCreatedDomainEvent($id, $name, $password));
		return $user;
	}
}
