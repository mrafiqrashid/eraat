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
        Schema::create('maritial_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('maritial_status');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        // Insert initial values
        // Assuming user with ID 1 exists
        $userId = 1;

        DB::table('maritial_statuses')->insert([
            ['maritial_status' => 'Single', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['maritial_status' => 'Married', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['maritial_status' => 'Divorced', 'created_by' => $userId, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maritial_statuses');
    }
};
