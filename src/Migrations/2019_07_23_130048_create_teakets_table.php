<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body');
            $table->integer('category_id');
            $table->integer('status_id');
            $table->integer('priority_id');
            $table->string('user_id');//teaket creator id
            $table->string('slug');
            $table->dateTime('reopened_at')->nullable();
            $table->dateTime('closed_at')->nullable();
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
        Schema::dropIfExists('teakets');
    }
}
