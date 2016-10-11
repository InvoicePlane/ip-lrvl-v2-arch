<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->unique()->nullable();
            $table->string('sku_type')->nullable();
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->decimal('purchase_price', 20, 5);
            $table->decimal('sales_price', 20, 5);
            $table->integer('stock')->nullable();
            $table->integer('group_id')->unsigned()->nullable(); // FK
            $table->boolean('is_disabled');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('item_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->integer('parent_group_id')->unsigned()->nullable(); // FK
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
        Schema::drop('item_groups');
    }
}
