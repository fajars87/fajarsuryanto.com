<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSkillproTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('skillpro',function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user");
            $table->string("skill")->nullable();
            $table->string("skill_range")->nullable();
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
        Schema::drop('skillpro');
    }

}