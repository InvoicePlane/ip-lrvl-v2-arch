<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned(); // FK
            $table->text('address_block');
            $table->string('country_code');
            $table->boolean('is_disabled');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('short_name')->nullable();
            $table->integer('main_contact_id')->unsigned()->nullable(); // FK
            $table->integer('main_address_id')->unsigned()->nullable(); // FK
            $table->integer('language_id')->unsigned(); // FK
            $table->boolean('is_company');
            $table->boolean('is_vendor');
            $table->boolean('is_disabled');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('forename');
            $table->string('surname');
            $table->integer('client_id')->unsigned(); // FK
            $table->integer('address_id')->unsigned()->nullable(); // FK
            $table->string('telephone');
            $table->string('mobile');
            $table->string('fax');
            $table->string('email');
            $table->string('web');
            $table->boolean('is_disabled');
            $table->timestamps();
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
        Schema::drop('addresses');
        Schema::drop('clients');
        Schema::drop('contacts');
    }
}
