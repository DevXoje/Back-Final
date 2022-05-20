<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('role')->nullable()->default('customer');
			$table->string('name');
			$table->string('email', 60)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
		});
		
		Schema::create('customers', function (Blueprint $table) {
			$table->unsignedInteger('id');
			$table->string('official_doc')->unique();// TODO pasar este campo al modelo padre
			$table->string('address');
			$table->string('phone');
			$table->string('stripe_id')->nullable()->collation('utf8mb4_bin');
			$table->string('card_brand')->nullable();
			$table->string('card_last_four', 4)->nullable();
			$table->timestamp('trial_ends_at')->nullable();
			$table->timestamps();

			//$table->foreign('id')->references('id')->on('users');

		});

		Schema::create('admins', function (Blueprint $table) {
			$table->unsignedInteger('id');
			$table->boolean('is_super')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
		Schema::dropIfExists('customers');
		Schema::dropIfExists('admins');
	}
}
