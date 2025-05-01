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
            $table->integer('question_1');
            $table->integer('question_2');
            $table->integer('question_3');
            $table->integer('question_4');
            $table->integer('question_5');
            $table->integer('question_6');
            $table->integer('question_7');
            $table->integer('question_8');
            $table->integer('question_9');
            $table->integer('question_10');
            $table->integer('question_11');
            $table->integer('question_12');
            $table->integer('question_13');
            $table->integer('question_14');
            $table->integer('question_15');
            $table->integer('question_16');
            $table->integer('question_17');
            $table->integer('question_18');
            $table->integer('question_19');
            $table->integer('question_20');
            $table->integer('question_21');
            $table->integer('question_22');
            $table->integer('question_23');
            $table->integer('question_24');
            $table->integer('question_25');
            $table->integer('question_26');
            $table->integer('question_27');
            $table->integer('question_28');
            $table->integer('question_29');
            $table->integer('question_30');
            $table->integer('question_31');
            $table->string('description');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
