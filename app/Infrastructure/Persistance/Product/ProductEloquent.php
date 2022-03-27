<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistance\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/* use Laravel\Passport\HasApiTokens; */

final class ProductEloquent extends Authenticatable
{
	use /* HasApiTokens, */ HasFactory, Notifiable;
	protected $table = "product";
	protected $primaryKey = "id";
	public $timestamps = false;


	protected $fillable = [
		'name',
	];

	protected $hidden = [
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	public function __construct()
	{
	}
	public static function create(int $id, string $name, string $password): self
	{
		$user = new self($id, $name, $password);
		//$user->record(new UserWasCreatedDomainEvent($id, $name, $password));
		return $user;
	}

	public function categories()
	{
		return $this->hasMany(CategoryEloquent::class);
	}
}
