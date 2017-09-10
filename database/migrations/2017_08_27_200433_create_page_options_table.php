<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_options', function (Blueprint $table) {
           $table->increments('id');
            $table->string('page_options_title')->nullable();
            $table->string('page_options_slug')->nullable();
            $table->string('page_options_body')->nullable();
            $table->timestamps();
//
            $table->integer('page_id')
                ->unsigned();
            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_options');
        //Schema::dropForeign('page_options_page_id_foreign');
    }
}
