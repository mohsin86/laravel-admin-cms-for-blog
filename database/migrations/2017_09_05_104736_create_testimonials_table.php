<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('testimonial_name');
            $table->string('testimonial_images')->nullable();
            $table->string('testimonial_companies')->nullable();
            $table->string('testimonial_country')->nullable();
            $table->string('testimonial_facebook')->nullable();
            $table->string('testimonial_twitter')->nullable();
            $table->string('testimonial_google_pluS')->nullable();
            $table->string('testimonial_extra')->nullable();
            $table->text('testimonial_desc');
            $table->integer('user_id')->unsigned();

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
        Schema::dropIfExists('testimonials');
    }
}
