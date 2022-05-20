<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Customer as StripeCustomer;
use Stripe\Exception\ApiErrorException;

class Order extends Model
{
	use HasFactory;

	protected $fillable = [
		'customer_id',
		'status',
		'amount',
		'stripe_id',
		'stripe_charge_id',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'customer_id' => 'integer',
		'status' => 'string',
		'total' => 'float',
		'stripe_id' => 'string',
		'stripe_charge_id' => 'string',
	];


	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}


	public function orderItems()
	{
		return $this->hasMany(OrderItem::class);
	}


}
/*
 *
 * {
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'amount',
    ];

	public static function create(array $attributes = [])
	{
		$order = parent::create($attributes);

		try {
			$customer = StripeCustomer::retrieve([
				'id' => $order->user->stripe_id,
			]);
		} catch (ApiErrorException $e) {
			$customer = StripeCustomer::create([
				'email' => $order->user->email,
				'name' => $order->user->name,
			]);
		}

		$charge = \Stripe\Charge::create([
			'customer' => $customer->id,
			'amount' => $order->amount,
			'currency' => 'eur',
		]);

		$order->update([
			'charge_id' => $charge->id,
		]);

		return $order;
	}

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}*/
