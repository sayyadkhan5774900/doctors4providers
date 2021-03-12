<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('phone');
            $table->longText('address');
            $table->longText('practice');
            $table->longText('experience')->nullable();
            $table->longText('specialization');
            $table->longText('certifications')->nullable();
            $table->longText('communication_form');
            $table->longText('collaborative_communication');
            $table->longText('states_licensed');
            $table->longText('have_malpractice');
            $table->longText('additional_notes')->nullable();
            $table->longText('monthly_stipend');
            $table->string('last_name');
            $table->string('first_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
