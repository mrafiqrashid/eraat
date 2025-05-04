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
        Schema::create('education_levels', function (Blueprint $table) {
            $table->id();
            $table->string('education_level');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        // Insert initial values
        // Assuming user with ID 1 exists
        $userId = 1;

        DB::table('education_levels')->insert([
            ['education_level' => 'Primary Education', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['education_level' => 'Secondary Education', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['education_level' => 'Undergraduate Education', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['education_level' => 'Postgraduate Education', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['education_level' => 'No Formal Education', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_levels');
    }
};
