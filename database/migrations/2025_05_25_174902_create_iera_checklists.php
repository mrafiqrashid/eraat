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
        Schema::create('iera_checklists', function (Blueprint $table) {
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
            $table->boolean('fe_ll_question_1a_applicable')->default(false);
            $table->boolean('fe_ll_question_1b_applicable')->default(false);
            $table->boolean('fe_ll_question_2a_applicable')->default(false);
            $table->boolean('fe_ll_question_2b_applicable')->default(false);
            $table->boolean('fe_ll_question_3a_applicable')->default(false);
            $table->boolean('fe_ll_question_3b_applicable')->default(false);
            $table->boolean('fe_ll_question_4a_applicable')->default(false);
            $table->boolean('fe_ll_question_4b_applicable')->default(false);
            $table->boolean('fe_ll_question_5a_applicable')->default(false);
            $table->boolean('fe_ll_question_5b_applicable')->default(false);
            $table->decimal('fe_ll_question_1a', 10, 3)->nullable();
            $table->decimal('fe_ll_question_1b', 10, 3)->nullable();
            $table->decimal('fe_ll_question_2a', 10, 3)->nullable();
            $table->decimal('fe_ll_question_2b', 10, 3)->nullable();
            $table->decimal('fe_ll_question_3a', 10, 3)->nullable();
            $table->decimal('fe_ll_question_3b', 10, 3)->nullable();
            $table->decimal('fe_ll_question_4a', 10, 3)->nullable();
            $table->decimal('fe_ll_question_4b', 10, 3)->nullable();
            $table->decimal('fe_ll_question_5a', 10, 3)->nullable();
            $table->decimal('fe_ll_question_5b', 10, 3)->nullable();
            $table->integer('fe_rll_question_1a')->nullable();
            $table->integer('fe_rll_question_2a')->nullable();
            $table->integer('fe_rll_question_3a')->nullable();
            $table->integer('fe_rll_question_4a')->nullable();
            $table->integer('fe_rll_question_5a')->nullable();
            $table->integer('fe_rll_question_1b')->nullable();
            $table->integer('fe_rll_question_2b')->nullable();
            $table->integer('fe_rll_question_3b')->nullable();
            $table->integer('fe_rll_question_4b')->nullable();
            $table->integer('fe_rll_question_5b')->nullable();
            $table->integer('fe_lltbp_question_1a')->nullable();
            $table->integer('fe_lltbp_question_2a')->nullable();
            $table->integer('fe_lltbp_question_3a')->nullable();
            $table->integer('fe_lltbp_question_4a')->nullable();
            $table->integer('fe_lltbp_question_5a')->nullable();
            $table->integer('fe_lltbp_question_1b')->nullable();
            $table->integer('fe_lltbp_question_2b')->nullable();
            $table->integer('fe_lltbp_question_3b')->nullable();
            $table->integer('fe_lltbp_question_4b')->nullable();
            $table->integer('fe_lltbp_question_5b')->nullable();


            $table->unsignedTinyInteger('fe_pp_question_1')->nullable()->default(null);
            $table->unsignedTinyInteger('fe_pp_question_2')->nullable()->default(null);
            $table->unsignedTinyInteger('fe_pp_question_3')->nullable()->default(null);
            $table->unsignedTinyInteger('fe_pp_question_4')->nullable()->default(null);
            $table->unsignedTinyInteger('fe_pp_question_5')->nullable()->default(null);
            $table->string('fe_pp_question_6_sub_1')->nullable();
            $table->unsignedTinyInteger('fe_pp_question_6')->nullable()->default(null);
            $table->string('fe_pp_question_7_sub_1')->nullable();
            $table->unsignedTinyInteger('fe_pp_question_7')->nullable()->default(null);

            $table->string('fe_hsp_question_1_subQuestion_1')->nullable();
            $table->string('fe_hsp_question_1_subQuestion_2')->nullable();
            $table->decimal('fe_hsp_question_1_subQuestion_3', 10, 3)->nullable();
            $table->decimal('fe_hsp_question_1_subQuestion_4', 10, 3)->nullable();
            $table->unsignedTinyInteger('fe_hsp_question_1')->nullable()->default(null);

            $table->unsignedTinyInteger('fe_c_question_1')->nullable()->default(null);
            $table->unsignedTinyInteger('fe_c_question_2')->nullable()->default(null);
            $table->unsignedTinyInteger('fe_c_question_3')->nullable()->default(null);
            $table->unsignedTinyInteger('fe_c_question_4')->nullable()->default(null);





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



            $table->integer('ap_score')->nullable();
            $table->integer('snswp_score')->nullable();
            $table->integer('fe_ll_score')->nullable();
            $table->integer('fe_rll_score')->nullable();
            $table->integer('fe_lltbp_score')->nullable();
            $table->integer('fe_rlltbp_score')->nullable();
            $table->integer('fe_pp_score')->nullable();
            $table->integer('fe_hsp_score')->nullable();
            $table->integer('fe_c_score')->nullable();
            $table->integer('fe_score')->nullable();
            $table->integer('rm_score')->nullable();
            $table->integer('vibration_score')->nullable();
            $table->integer('lighting_score')->nullable();
            $table->integer('temperature_score')->nullable();
            $table->integer('ventilation_score')->nullable();
            $table->integer('noise_score')->nullable();

            $table->decimal('ieraChecklist_totalScore', 10, 2)->default(0.0);


            $table->string('fe_bc_1_gender')->nullable();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
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
        Schema::dropIfExists('iera_checklists');
    }
};
