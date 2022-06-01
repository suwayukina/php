<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string('name');
            $table->integer('age')->unsigned();
            $table->string('phone');
            $table->integer('usercd')->unsigned()->index();
            $table->foreign('usercd')->references('user_id')->on('office_masters')->cascadeOnUpdate();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
