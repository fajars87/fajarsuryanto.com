<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePortfolio1Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('portfolio1',function(Blueprint $table){
            $table->increments("id");
            $table->integer("catportfolio_id")->references("id")->on("catportfolio");
            $table->string("title");
            $table->string("desc")->nullable();
            $table->string("pict")->nullable();
            $table->string("detpict")->nullable();
            $table->string("complete")->nullable();
            $table->string("client")->nullable();
            $table->text("isi")->nullable();
            $table->string("url")->nullable();
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
        Schema::drop('portfolio1');
    }

}