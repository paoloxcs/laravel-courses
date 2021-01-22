<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_social', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon', 15);
            $table->longText('url_social');
            $table->integer('instructor_id')->unsigned();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
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
        Schema::dropIfExists('instructor_social');
    }
}
