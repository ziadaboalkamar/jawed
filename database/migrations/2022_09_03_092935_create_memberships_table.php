<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->string('job_name')->nullable();
            $table->text('job_address')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_date')->nullable();
            $table->string('id_source')->nullable();
            $table->string('phone')->nullable();
            $table->string('telephone')->nullable();
            $table->text('address')->nullable();
            $table->string('post_address')->nullable();
            $table->string('type')->nullable();
            $table->string('start_date')->nullable();
            $table->string('tranfer_file')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
