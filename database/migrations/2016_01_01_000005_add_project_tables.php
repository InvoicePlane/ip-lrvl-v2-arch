<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->integer('leader_id')->unsigned()->nullable(); // FK
            $table->integer('client_id')->unsigned()->nullable(); // FK
            $table->boolean('is_completed');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('time_trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned(); // FK
            $table->integer('user_id')->unsigned(); // FK
            $table->integer('voucher_item_id')->unsigned()->nullable(); // FK
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('project_id')->unsigned(); // FK
            $table->integer('author_id')->unsigned(); // FK
            $table->integer('assignee_id')->unsigned()->nullable(); // FK
            $table->integer('status_id')->unsigned(); // FK
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('task_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->enum('type', ['start', 'step', 'end']);
            $table->string('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
        Schema::drop('time_trackings');
        Schema::drop('tasks');
        Schema::drop('task_statuses');
    }
}
