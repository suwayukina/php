<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_masters', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->integer('user_id')->unsigned()->index();
            $table->integer('deploy_cd')->unsigned();
            $table->date('assignmentdate');
            $table->string('update_by');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('office_masters');
    }
}
