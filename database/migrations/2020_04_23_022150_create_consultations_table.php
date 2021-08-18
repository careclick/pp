<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('patient_id');
            $table->uuid('doctor_id');
            $table->string('occupation')->nullable();
            $table->string('lmp')->nullable();
            $table->string('bp')->nullable();
            $table->string('weight')->nullable();
            $table->text('complaint')->nullable();
            $table->text('hc')->nullable();
            $table->text('past_medical')->nullable();
            $table->text('surgical_history')->nullable();
            $table->text('drug_history')->nullable();
            $table->text('treatment_plan')->nullable();
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('consultations');
    }
}
