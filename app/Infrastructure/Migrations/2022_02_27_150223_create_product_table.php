<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function (Blueprint $table) {
			$table->id();
			$table->string("name", 30)->unique();
			$table->string("description");
			$table->string("main_image");
			$table->string("images");//guarrada
			$table->integer("stock");
			$table->integer("price")->default(0);
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
		Schema::dropIfExists('product');
	}
}
