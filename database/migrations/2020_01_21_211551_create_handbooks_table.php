<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handbooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_handbook');
            $table->enum('limitation',['Cognitive','Locomotion','Vision','hearing']);
            $table->integer('body_mass');
            $table->string('weight');
            $table->longText('reports');
            $table->date('service_date');
            $table->string('complaints');
            $table->string('symptoms');
            $table->string('vital_signs');
            $table->enum('blood type', ['A+','A-','B+','B-','AB+','AB-','O+', 'O-']);
            $table->string('blood_pressure');
            $table->string('hgt');
            $table->string('temperature');
            
            $table->unsignedBigInteger('relative_id');
            $table->foreign('relative_id')->references('id')->on('relatives');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('handbooks');
    }
}
