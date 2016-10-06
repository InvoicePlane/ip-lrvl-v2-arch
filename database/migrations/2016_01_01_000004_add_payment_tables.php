<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
            $table->integer('payment_method_id')->unsigned(); // FK
            $table->decimal('paid_amount', 20, 5);
            $table->string('op_transaction_id')->nullable();
            $table->text('op_message')->nullable();
            $table->timestamps();
        });

        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier')->unique();
            $table->string('client_key')->nullable();
            $table->string('client_secret')->nullable();
            $table->boolean('testing_enabled');
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->integer('payment_gateway_id')->unsigned()->nullable(); // FK
            $table->boolean('is_disabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
        Schema::drop('payment_gateways');
        Schema::drop('payment_methods');
    }
}
