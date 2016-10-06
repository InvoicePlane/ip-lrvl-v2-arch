<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('attachable');
            $table->integer('uploader_id')->unsigned(); // FK
            $table->string('title');
            $table->string('file_name');
            $table->string('file_extension');
            $table->integer('file_size');
            $table->string('original_file_name');
            $table->string('original_file_extension');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->string('from_mail');
            $table->string('from_name')->nullable();
            $table->string('to')->nullable();
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->text('content_template');
            $table->boolean('is_disabled');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('notable');
            $table->text('content');
            $table->integer('author_id')->unsigned(); // FK
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tax_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('identifier');
            $table->decimal('percentage', 5, 5);
            $table->boolean('is_disabled');
        });

        Schema::create('tax_rate_voucher_item', function (Blueprint $table) {
            $table->integer('voucher_item_id')->unsigned();
            $table->integer('tax_rate_id')->unsigned();

            $table->primary(['voucher_item_id', 'tax_rate_id']);
        });

        Schema::create('tax_rate_voucher', function (Blueprint $table) {
            $table->integer('voucher_id')->unsigned();
            $table->integer('tax_rate_id')->unsigned();

            $table->primary(['voucher_id', 'tax_rate_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attachments');
        Schema::drop('email_templates');
        Schema::drop('notes');
        Schema::drop('tax_rates');
    }
}
