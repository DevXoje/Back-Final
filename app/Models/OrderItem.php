<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	use HasFactory;

	protected $table = 'order_items';

	protected $fillable = [
		'customer_id',
		'product_id',
		'quantity',
		'amount',
	];

	protected $casts = [
		'customer_id' => 'integer',
		'product_id' => 'integer',
		'quantity' => 'integer',
		'amount' => 'float',
	];

	public static function create($order_item_data): OrderItem
	{
		$order_item = new OrderItem();
		$order_item->customer_id = $order_item_data['customer_id'];
		$order_item->product_id = $order_item_data['product_id'];
		$order_item->quantity = $order_item_data['quantity'];
		$order_item->amount = $order_item_data['quantity'];
		$order_item->save();

		return $order_item;
	}


	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
