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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('tag_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->enum('status',['New','Used','Damanged'])->default('Normal');
            $table->enum('location',['Stock','Branch'])->default('Stock');
            $table->foreignId('branch_id')->constrained('branches')->nullable()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('author');
            $table->string('remark')->nullable();
            $table->string('pur_date')->nullable();
            $table->string('issue_date')->nullable();
            $table->enum('disposal',['true','false'])->default('false')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
