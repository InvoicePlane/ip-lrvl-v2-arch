<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomFieldTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->string('type');
            $table->string('available_values')->nullable();
            $table->text('default_value')->nullable();
            $table->string('related_model')->nullable();
            $table->boolean('is_disabled');
        });

        Schema::create('custom_field_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_field_id')->unsigned(); // FK
            $table->integer('model_id')->unsigned(); // Soft FK
            $table->text('value');
            $table->integer('author_id')->unsigned(); // FK
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
        Schema::drop('custom_fields');
        Schema::drop('custom_field_values');
    }
}
