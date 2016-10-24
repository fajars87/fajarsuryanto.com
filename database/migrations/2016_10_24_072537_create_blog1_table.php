<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateBlog1Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('blog1',function(Blueprint $table){
            $table->increments("id");
            $table->integer("bcat_id")->references("id")->on("bcat");
            $table->integer("user_id")->references("id")->on("user");
            $table->string("title")->nullable();
            $table->string("pict")->nullable();
            $table->string("desc")->nullable();
            $table->text("isi")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog1');
    }

}