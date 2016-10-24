<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateStatusTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('status',function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user")->nullable();
            $table->enum("icon", ["green-marker", "red-marker", "orange-marker"])->nullable();
            $table->string("detail")->nullable();
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
        Schema::drop('status');
    }

}