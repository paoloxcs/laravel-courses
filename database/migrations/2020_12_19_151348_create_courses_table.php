<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 120);
            $table->string('title', 180);
            $table->longText('slug');
            $table->string('schedule', 50);
            $table->string('fecha', 40);
            $table->date('date_start');
            $table->string('duration', 30);
            $table->integer('session');
            $table->boolean('is_active');
            $table->longText('objectives');
            $table->longText('public');
            $table->string('url_thumbnail', 15);
            $table->string('portrait', 15);
            $table->string('description', 15);
            $table->string('inversion', 15);
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
        Schema::dropIfExists('courses');
    }
}
