<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTable extends Migration
{
	var $table_name = "auth";
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("auth", function (Blueprint $table) {
			$table->id();
			$table->string("name");
			$table->string("email", 60)->unique();
			$table->date('email_verified_at')->nullable();
			$table->text("password");
			$table->text("remember_token")->nullable();
			$table->string("role")->default("customer");
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
		Schema::dropIfExists("auth");
	}
}
