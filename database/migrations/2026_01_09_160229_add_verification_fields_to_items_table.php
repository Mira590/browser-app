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
        Schema::table('items', function (Blueprint $table) {
            //
             $table->foreignId('created_by')
                  ->after('id')
                  ->constrained('users')
                  ->cascadeOnDelete();

                   $table->foreignId('verified_by')
                  ->nullable()
                  ->after('created_by')
                  ->constrained('users')
                  ->nullOnDelete();


                   $table->enum('verification_status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('verified_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['verified_by']);
            $table->dropColumn(['created_by', 'verified_by', 'verification_status']);
        });
    }
};
