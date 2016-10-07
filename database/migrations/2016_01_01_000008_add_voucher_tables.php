<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVoucherTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
        });

        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
        });

        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
        });

        Schema::create('recurring_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('base_invoice_id')->unsigned(); // FK
            $table->integer('base_voucher_id')->unsigned(); // FK
            $table->string('base_invoice_type');
            $table->boolean('is_disabled');
            $table->string('interval');
            $table->timestamp('next_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_number')->unique(); // FK
            $table->integer('company_id')->unsigned()->nullable(); // FK
            $table->integer('voucher_group_id')->unsigned()->nullable(); // FK
            $table->integer('status_id')->unsigned()->nullable(); // FK
            $table->integer('user_id')->unsigned()->nullable(); // FK
            $table->integer('client_id')->unsigned()->nullable(); // FK
            $table->integer('currency_id')->unsigned()->nullable(); // FK
            $table->integer('language_id')->unsigned()->nullable(); // FK
            $table->integer('project_id')->unsigned()->nullable(); // FK
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('voucher_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
            $table->decimal('item_subtotal', 20, 5);
            $table->decimal('item_discount_total', 20, 5);
            $table->decimal('item_tax_total', 20, 5);
            $table->decimal('item_total', 20, 5);
            $table->decimal('voucher_discount_amount', 20, 5);
            $table->decimal('voucher_discount_percent', 20, 5);
            $table->decimal('voucher_tax_total', 20, 5);
            $table->decimal('voucher_total', 20, 5);
            $table->decimal('voucher_paid', 20, 5);
            $table->decimal('voucher_balance', 20, 5);
        });

        Schema::create('voucher_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->text('identifier_template');
            $table->integer('next_id');
            $table->boolean('is_disabled');
            $table->softDeletes();
        });

        Schema::create('voucher_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned(); // FK
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('item_order');
            $table->integer('original_item_id')->unsigned()->nullable(); // FK
            $table->integer('task_id')->unsigned()->nullable(); // FK
            $table->integer('item_tax_id')->unsigned()->nullable(); // FK
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('item_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned(); // FK
            $table->decimal('item_amount', 20, 5);
            $table->decimal('item_purchase_price', 20, 5);
            $table->decimal('item_sales_price', 20, 5);
            $table->decimal('item_subtotal', 20, 5);
            $table->decimal('item_discount_amount', 20, 5);
            $table->decimal('item_discount_percent', 20, 5);
            $table->decimal('item_discount_total', 20, 5);
            $table->decimal('item_tax_total', 20, 5);
            $table->decimal('item_total', 20, 5);
        });

        Schema::create('voucher_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->enum('type', ['start', 'step', 'end']);
            $table->string('color')->nullable();
            $table->boolean('read_only');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('credit_invoices');
        Schema::drop('invoices');
        Schema::drop('purchase_invoices');
        Schema::drop('quotes');
        Schema::drop('recurring_invoices');
        Schema::drop('vouchers');
        Schema::drop('voucher_amounts');
        Schema::drop('voucher_groups');
        Schema::drop('voucher_items');
        Schema::drop('item_amounts');
        Schema::drop('voucher_statuses');
    }
}
