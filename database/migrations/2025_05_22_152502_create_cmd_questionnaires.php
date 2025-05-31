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
        Schema::create('cmd_questionnaires', function (Blueprint $table) {
            $table->id();

            $table->decimal('neck_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('neck_b')->nullable()->default(null);
            $table->unsignedTinyInteger('neck_c')->nullable()->default(null);
            $table->decimal('neck_score', 3, 1)->default(0.0);

            $table->decimal('shoulder_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('shoulder_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('shoulder_right_c')->nullable()->default(null);
            $table->decimal('shoulder_right_score', 3, 1)->default(0.0);

            $table->decimal('shoulder_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('shoulder_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('shoulder_left_c')->nullable()->default(null);
            $table->decimal('shoulder_left_score', 3, 1)->default(0.0);

            $table->decimal('upper_back_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('upper_back_b')->nullable()->default(null);
            $table->unsignedTinyInteger('upper_back_c')->nullable()->default(null);
            $table->decimal('upper_back_score', 3, 1)->default(0.0);

            $table->decimal('upper_arm_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('upper_arm_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('upper_arm_right_c')->nullable()->default(null);
            $table->decimal('upper_arm_right_score', 3, 1)->default(0.0);

            $table->decimal('upper_arm_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('upper_arm_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('upper_arm_left_c')->nullable()->default(null);
            $table->decimal('upper_arm_left_score', 3, 1)->default(0.0);

            $table->decimal('lower_back_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('lower_back_b')->nullable()->default(null);
            $table->unsignedTinyInteger('lower_back_c')->nullable()->default(null);
            $table->decimal('lower_back_score', 3, 1)->default(0.0);

            $table->decimal('forearm_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('forearm_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('forearm_right_c')->nullable()->default(null);
            $table->decimal('forearm_right_score', 3, 1)->default(0.0);

            $table->decimal('forearm_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('forearm_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('forearm_left_c')->nullable()->default(null);
            $table->decimal('forearm_left_score', 3, 1)->default(0.0);

            $table->decimal('wrist_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('wrist_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('wrist_right_c')->nullable()->default(null);
            $table->decimal('wrist_right_score', 3, 1)->default(0.0);

            $table->decimal('wrist_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('wrist_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('wrist_left_c')->nullable()->default(null);
            $table->decimal('wrist_left_score', 3, 1)->default(0.0);

            $table->decimal('hip_or_buttocks_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('hip_or_buttocks_b')->nullable()->default(null);
            $table->unsignedTinyInteger('hip_or_buttocks_c')->nullable()->default(null);
            $table->decimal('hip_or_buttocks_score', 3, 1)->default(0.0);

            $table->decimal('thigh_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('thigh_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('thigh_right_c')->nullable()->default(null);
            $table->decimal('thigh_right_score', 3, 1)->default(0.0);

            $table->decimal('thigh_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('thigh_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('thigh_left_c')->nullable()->default(null);
            $table->decimal('thigh_left_score', 3, 1)->default(0.0);

            $table->decimal('knee_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('knee_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('knee_right_c')->nullable()->default(null);
            $table->decimal('knee_right_score', 3, 1)->default(0.0);

            $table->decimal('knee_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('knee_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('knee_left_c')->nullable()->default(null);
            $table->decimal('knee_left_score', 3, 1)->default(0.0);

            $table->decimal('lower_leg_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('lower_leg_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('lower_leg_right_c')->nullable()->default(null);
            $table->decimal('lower_leg_right_score', 3, 1)->default(0.0);

            $table->decimal('lower_leg_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('lower_leg_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('lower_leg_left_c')->nullable()->default(null);
            $table->decimal('lower_leg_left_score', 3, 1)->default(0.0);

            $table->decimal('foot_right_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('foot_right_b')->nullable()->default(null);
            $table->unsignedTinyInteger('foot_right_c')->nullable()->default(null);
            $table->decimal('foot_right_score', 3, 1)->default(0.0);

            $table->decimal('foot_left_a', 3, 1)->default(0.0);
            $table->unsignedTinyInteger('foot_left_b')->nullable()->default(null);
            $table->unsignedTinyInteger('foot_left_c')->nullable()->default(null);
            $table->decimal('foot_left_score', 3, 1)->default(0.0);

            $table->decimal('cmdQuestionnaire_totalScore', 5, 1)->default(0.0);


            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
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
        Schema::dropIfExists('cmd_questionnaires');
    }
};
