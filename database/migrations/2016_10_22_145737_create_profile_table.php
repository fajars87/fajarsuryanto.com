<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateProfileTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('profile',function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user");
            $table->text("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("website")->nullable();
            $table->string("photo")->nullable();
            $table->text("about")->nullable();
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
        Schema::drop('profile');
    }

}