<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('info', 40);
            $table->float('amount', 8, 2);
            $table->float('dscto', 8, 2)->nullable();
            $table->boolean('promo');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('course_prices');
    }
}
