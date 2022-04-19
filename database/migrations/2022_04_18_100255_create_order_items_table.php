<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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



       /*  DB::unprepared('
        CREATE TRIGGER order_items_update_amount BEFORE INSERT ON order_items FOR EACH ROW
        BEGIN
            SET NEW.amount = NEW.quantity * (SELECT price FROM products WHERE id = NEW.product_id);
        END'); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');

        /* DB::unprepared('DROP TRIGGER `order_items_update_amount`'); */
    }
}
