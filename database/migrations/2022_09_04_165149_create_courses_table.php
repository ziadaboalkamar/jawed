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
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('period')->nullable();
            $table->string('date')->nullable();
            $table->string('trainer')->nullable();
            $table->string('city')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->enum('status', [0,1])->default(1);
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
