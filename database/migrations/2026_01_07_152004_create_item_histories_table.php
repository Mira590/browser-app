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
        Schema::create('item_histories', function (Blueprint $table) {
            $table->id();


              $table->foreignId('item_id')
                 ->constrained('items')
                 ->cascadeOnDelete();

                $table->foreignId('user_id')
                  ->constrained('users')
                   ->cascadeOnDelete();

                 $table->string('action'); 
    // issued, transferred, updated, returned, disposed

                  $table->foreignId('from_branch_id')->nullable()->constrained('branches');
                 
                  $table->foreignId('to_branch_id')->nullable()->constrained('branches');
              
                  $table->text('description')->nullable();
                   $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_histories');
    }
};
