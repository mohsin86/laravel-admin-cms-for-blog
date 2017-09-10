<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email',50)->unique();
            $table->string('profile_url')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_url')->nullable();
            $table->string('designation')->nullable();
            $table->text('extra_info')->nullable();
            $table->boolean('valid')->nullable();
            $table->string('source')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
