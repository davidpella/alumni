<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('type');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string("registration_number")->nullable();
            $table->year("graduation_year")->nullable();
            $table->unsignedInteger("course_id")->nullable();
            $table->enum("gender", ["male", "female"]);
            $table->string("current_employee")->nullable();
            $table->string("position")->nullable();
            $table->string("password");
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
        Schema::dropIfExists('alumni');
    }
}
