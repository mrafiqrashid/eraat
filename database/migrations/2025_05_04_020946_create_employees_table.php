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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('contact_no')->nullable();
            $table->string('employee_no')->nullable();
            $table->string('ic_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->foreignId('race_id')->constrained('races')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('education_level_id')->constrained('education_levels')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('maritial_status_id')->constrained('maritial_statuses')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('company_name')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->time('work_start_time')->nullable();
            $table->time('work_end_time')->nullable();
            $table->bigInteger('total_working_hours')->nullable();
            $table->String('total_working_hours_details')->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('employees');
    }
};
