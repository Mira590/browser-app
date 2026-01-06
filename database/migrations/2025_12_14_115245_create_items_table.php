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
            $table->string('tag_number')->unique()->nullable();
            $table->string('serial_number')->unique()->nullable();
            $table->enum('status',['New','Used','Damanged'])->default('New');
           // $table->enum('location',['Stock','Branch','Data_Center'])->default('Stock');
            $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete()->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();  
            $table->string('author');
            $table->string('remark')->nullable();
            $table->string('pur_date')->nullable();
            $table->string('issue_date')->nullable();
            $table->enum('disposal',['true','false'])->default('false')->nullable();
            $table->string('dis_date')->nullable();
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
