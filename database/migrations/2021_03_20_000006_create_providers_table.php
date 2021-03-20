<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone');
            $table->string('email');
            $table->date('date_of_agreement');
            $table->longText('practice')->nullable();
            $table->longText('current_licensure')->nullable();
            $table->longText('collaborative_need');
            $table->string('practice_states');
            $table->longText('communication_form');
            $table->longText('collaborative_communication');
            $table->longText('emr_system')->nullable();
            $table->longText('meeting_time')->nullable();
            $table->date('begin_seeing_patients')->nullable();
            $table->string('agent_can_contact')->nullable();
            $table->string('billing_company_can_contact')->nullable();
            $table->decimal('monthly_budget', 15, 2);
            $table->longText('additional_notes')->nullable();
            $table->integer('percentage_of_chart');
            $table->string('need_prescriptive_authority');
            $table->longText('prescribing_substances');
            $table->string('provider_need_collaborative_speak')->nullable();
            $table->longText('unique_request')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('have_malpractice');
            $table->string('have_billing_company');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
