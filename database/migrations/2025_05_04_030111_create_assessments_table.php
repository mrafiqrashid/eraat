<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->integer('ap_question_1')->nullable();
            $table->integer('ap_question_2')->nullable();
            $table->integer('ap_question_3')->nullable();
            $table->integer('ap_question_4')->nullable();
            $table->integer('ap_question_5')->nullable();
            $table->integer('ap_question_6')->nullable();
            $table->integer('ap_question_7')->nullable();
            $table->integer('ap_question_8')->nullable();
            $table->integer('ap_question_9')->nullable();
            $table->integer('ap_question_10')->nullable();
            $table->integer('ap_question_11')->nullable();
            $table->integer('ap_question_12')->nullable();
            $table->integer('ap_question_13')->nullable();
            $table->integer('snswp_question_1')->nullable();
            $table->integer('snswp_question_2')->nullable();
            $table->integer('snswp_question_3')->nullable();
            $table->integer('fe_question_1a')->nullable();
            $table->integer('fe_question_1b')->nullable();
            $table->integer('fe_question_2a')->nullable();
            $table->integer('fe_question_2b')->nullable();
            $table->integer('fe_question_3a')->nullable();
            $table->integer('fe_question_3b')->nullable();
            $table->integer('fe_question_4a')->nullable();
            $table->integer('fe_question_4b')->nullable();
            $table->integer('fe_question_5a')->nullable();
            $table->integer('fe_question_5b')->nullable();
            $table->integer('rm_question_1')->nullable();
            $table->integer('rm_question_2')->nullable();
            $table->integer('rm_question_3')->nullable();
            $table->integer('rm_question_4')->nullable();
            $table->integer('rm_question_5')->nullable();
            $table->integer('vibration_question_1')->nullable();
            $table->integer('vibration_question_2')->nullable();
            $table->integer('vibration_question_3')->nullable();
            $table->integer('vibration_question_4')->nullable();
            $table->integer('lighting_question_1')->nullable();
            $table->integer('temperature_question_1')->nullable();
            $table->integer('ventilation_question_1')->nullable();
            $table->integer('noise_question_1')->nullable();
            $table->integer('noise_question_2')->nullable();
            $table->string('description')->nullable();



            $table->integer('ap_result')->nullable();
            $table->integer('snswp_result')->nullable();
            $table->integer('fe_result')->nullable();
            $table->integer('rm_result')->nullable();
            $table->integer('vibration_result')->nullable();
            $table->integer('lighting_result')->nullable();
            $table->integer('temperature_result')->nullable();
            $table->integer('ventilation_result')->nullable();



            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('assessee_id')->constrained('assessees')->onDelete('cascade');
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
