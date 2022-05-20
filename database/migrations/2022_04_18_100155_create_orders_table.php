<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('customer_id');
			$table->string('stripe_id')->nullable();
			$table->string('stripe_charge_id')->nullable();
			$table->decimal('amount')->default(0);
			$table->string('status')->default('pending');
			$table->timestamps();
			//$table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
		});
		Schema::create('order_items', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('order_id')->unsigned();
			$table->bigInteger('product_id')->unsigned();
			$table->tinyInteger('quantity');
			$table->decimal('amount')->default(0);
			$table->timestamps();
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
		});
		Schema::create('invoices', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('admin_id');
			$table->unsignedInteger('order_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('orders');
		Schema::dropIfExists('order_items');
		Schema::dropIfExists('invoices');

	}
}
