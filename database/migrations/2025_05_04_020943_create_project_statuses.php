<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('project_status');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        // Insert initial values
        // Assuming user with ID 1 exists
        $userId = 1;

        DB::table('project_statuses')->insert([
            ['project_status' => 'Not started', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['project_status' => 'In-progress', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['project_status' => 'Completed', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_statuses');
    }
};
