<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices';
	protected $fillable = ['customer_id', 'admin_id','order_id'];

	public function customer()
	{
		return $this->belongsTo('App\Models\Customer');
	}

	public function order()
	{
		return $this->belongsTo('App\Models\Order');
	}

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin');
	}


}
