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
            $table->integer('question_1')->nullable();
            $table->integer('question_2')->nullable();
            $table->integer('question_3')->nullable();
            $table->integer('question_4')->nullable();
            $table->integer('question_5')->nullable();
            $table->integer('question_6')->nullable();
            $table->integer('question_7')->nullable();
            $table->integer('question_8')->nullable();
            $table->integer('question_9')->nullable();
            $table->integer('question_10')->nullable();
            $table->integer('question_11')->nullable();
            $table->integer('question_12')->nullable();
            $table->integer('question_13')->nullable();
            $table->integer('question_14')->nullable();
            $table->integer('question_15')->nullable();
            $table->integer('question_16')->nullable();
            $table->integer('question_17')->nullable();
            $table->integer('question_18')->nullable();
            $table->integer('question_19')->nullable();
            $table->integer('question_20')->nullable();
            $table->integer('question_21')->nullable();
            $table->integer('question_22')->nullable();
            $table->integer('question_23')->nullable();
            $table->integer('question_24')->nullable();
            $table->integer('question_25')->nullable();
            $table->integer('question_26')->nullable();
            $table->integer('question_27')->nullable();
            $table->integer('question_28')->nullable();
            $table->integer('question_29')->nullable();
            $table->integer('question_30')->nullable();
            $table->integer('question_31')->nullable();
            $table->string('description')->nullable();
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
