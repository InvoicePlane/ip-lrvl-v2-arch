<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('short_name')->nullable();
            $table->integer('address_id')->unsigned()->nullable(); // FK
            $table->boolean('is_disabled');
            $table->timestamps();
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('currency_symbol');
            $table->boolean('symbol_placement');
            $table->string('thousand_separator');
            $table->string('decimal_separator');
            $table->tinyInteger('decimal_places');
            $table->boolean('is_disabled');
        });

        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('lang_code');
            $table->string('country_code');
            $table->boolean('is_disabled');
            $table->timestamp('last_update')->nullable();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->binary('value');
            $table->integer('company_id')->unsigned()->nullable(); // FK
            $table->integer('user_id')->unsigned()->nullable(); // FK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
        Schema::drop('currencies');
        Schema::drop('languages');
        Schema::drop('settings');
    }
}
