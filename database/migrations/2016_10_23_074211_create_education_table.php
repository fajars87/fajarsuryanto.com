<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateEducationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('education',function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user");
            $table->string("name")->nullable();
            $table->string("address")->nullable();
            $table->string("period")->nullable();
            $table->string("level")->nullable();
            $table->text("note")->nullable();
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
        Schema::drop('education');
    }

}