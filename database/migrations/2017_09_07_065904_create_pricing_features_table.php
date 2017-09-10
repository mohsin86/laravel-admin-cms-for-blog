<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pricing_additional_feature_title');
            $table->integer('pricing_id')->unsigned();
            $table->timestamps();

            $table->foreign('pricing_id')
                ->references('id')->on('pricings')
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
        Schema::dropIfExists('pricing_features');
    }
}
