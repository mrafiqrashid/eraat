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
        Schema::create('mds_forms', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('neck_a')->default(0);
            $table->tinyInteger('neck_b')->default(0);
            $table->tinyInteger('shoulder_a')->default(0);
            $table->tinyInteger('shoulder_b')->default(0);
            $table->tinyInteger('upperBack_a')->default(0);
            $table->tinyInteger('upperBack_b')->default(0);
            $table->tinyInteger('upperArm_a_left')->default(0);
            $table->tinyInteger('upperArm_a_right')->default(0);
            $table->tinyInteger('upperArm_b_left')->default(0);
            $table->tinyInteger('upperArm_b_right')->default(0);
            $table->tinyInteger('elbow_a_left')->default(0);
            $table->tinyInteger('elbow_a_right')->default(0);
            $table->tinyInteger('elbow_b_left')->default(0);
            $table->tinyInteger('elbow_b_right')->default(0);
            $table->tinyInteger('lowerArm_a_left')->default(0);
            $table->tinyInteger('lowerArm_a_right')->default(0);
            $table->tinyInteger('lowerArm_b_left')->default(0);
            $table->tinyInteger('lowerArm_b_right')->default(0);
            $table->tinyInteger('wrist_a_left')->default(0);
            $table->tinyInteger('wrist_a_right')->default(0);
            $table->tinyInteger('wrist_b_left')->default(0);
            $table->tinyInteger('wrist_b_right')->default(0);

            $table->tinyInteger('hand_a_left')->default(0);
            $table->tinyInteger('hand_a_right')->default(0);
            $table->tinyInteger('hand_b_left')->default(0);
            $table->tinyInteger('hand_b_right')->default(0);


            $table->tinyInteger('lowerBack_a')->default(0);
            $table->tinyInteger('lowerBack_b')->default(0);


            $table->tinyInteger('thigh_a_left')->default(0);
            $table->tinyInteger('thigh_a_right')->default(0);
            $table->tinyInteger('thigh_b_left')->default(0);
            $table->tinyInteger('thigh_b_right')->default(0);

            $table->tinyInteger('knee_a_left')->default(0);
            $table->tinyInteger('knee_a_right')->default(0);
            $table->tinyInteger('knee_b_left')->default(0);
            $table->tinyInteger('knee_b_right')->default(0);
            $table->tinyInteger('calf_a_left')->default(0);
            $table->tinyInteger('calf_a_right')->default(0);
            $table->tinyInteger('calf_b_left')->default(0);
            $table->tinyInteger('calf_b_right')->default(0);
            $table->tinyInteger('ankle_a_left')->default(0);
            $table->tinyInteger('ankle_a_right')->default(0);
            $table->tinyInteger('ankle_b_left')->default(0);
            $table->tinyInteger('ankle_b_right')->default(0);
            $table->tinyInteger('feet_a_left')->default(0);
            $table->tinyInteger('feet_a_right')->default(0);
            $table->tinyInteger('feet_b_left')->default(0);
            $table->tinyInteger('feet_b_right')->default(0);


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
        Schema::dropIfExists('mds_forms');
    }
};
