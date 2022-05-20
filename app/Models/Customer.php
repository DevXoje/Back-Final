<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Cashier;
use function Illuminate\Events\queueable;


class Customer extends Model
{
	use HasFactory, Billable;

	protected $autoIncrement = false;
	protected $table = "customers";
	protected $guard = 'customer';
	protected $fillable = [
		"address",
		"phone",
		"id",
		"stripe_id",
		"official_doc",
		"card_brand",
		"card_last_four",
		"trial_ends_at"
	];

	protected $casts = [
		"address" => "string",
		"phone" => "string",
		"id" => "integer",
		"stripe_id" => "string",
		"official_doc" => "string",
		"card_brand" => "string",
		"card_last_four" => "string",
		"trial_ends_at" => "datetime"
	];

	public static function create($user_data): Customer
	{
		$user = new User([
			'name' => $user_data['name'],
			'password' => $user_data['password'],
			'email' => $user_data['email'],
		]);
		$user->save();
		$customer = new Customer([
			'id' => $user->id,
			'address' => $user_data['address'],
			'phone' => $user_data['phone'],
			'official_doc' => $user_data['official_doc'],
		]);
		// Todo: Repair bad code, fails user->id
		$customer->save();
		$customer->id = $user->id;
		$customer_stripe = Cashier::stripe()->customers->create([
			'email' => $user->email,
			'name' => $user->name,
			'phone' => $customer->phone,
			'address' => $customer->address,
			//Todo Probar a intruducir mas datos
		]);
		$customer->stripe_id = $customer_stripe->id;
		$customer->save();
		return $customer;
	}

	protected static function booted()
	{
		// bind DB and Stripe customers
		static::updated(queueable(function ($customer) {
			if ($customer->hasStripeId()) {
				$customer->syncStripeCustomerDetails();
			}
		}));
	}

// getters for Stripe

	public function stripeAddress(): ?string
	{
		return $this->address;
	}


	public function stripeEmail(): ?string
	{
		return $this->email;
	}

	public function stripeName(): ?string
	{
		return $this->name;
	}

	public function stripePhone(): ?string
	{
		return $this->phone;
	}


// relations
	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Some "user-friendly" aliases for the interface methods.  🙂
	 */
	public function getAccountId()
	{
		return $this->getAuthIdentifier();
	}

	/**
	 * Get the unique identifier for the account.
	 * Required by Illuminate\Auth\UserInterface.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getEmailAddr()
	{
		return $this->getReminderEmail();
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 * Required by Illuminate\Auth\Reminders\RemindableInterface.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->getAuthPassword();
	}

	/**
	 * Get the password for the account.
	 * Required by Illuminate\Auth\UserInterface.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}
}
