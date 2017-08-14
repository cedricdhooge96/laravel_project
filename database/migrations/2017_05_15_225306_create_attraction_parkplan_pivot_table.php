<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionParkplanPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_parkplan', function (Blueprint $table) {
            $table->integer('attraction_id')->unsigned()->index();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onDelete('cascade');
            $table->integer('parkplan_id')->unsigned()->index();
            $table->foreign('parkplan_id')->references('id')->on('parkplans')->onDelete('cascade');
            $table->primary(['attraction_id', 'parkplan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attraction_parkplan');
    }
}
