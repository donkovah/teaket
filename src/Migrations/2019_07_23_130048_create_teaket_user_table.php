<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeaketUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaket_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('teaket_id');
            $table->integer('user_id'); //this is the ticket Admin
            $table->boolean('is_admin')->default(false); //shows the Admin
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
        Schema::dropIfExists('teaket_user');
    }
}
