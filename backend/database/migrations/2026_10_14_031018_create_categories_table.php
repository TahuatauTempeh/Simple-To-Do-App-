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
        Schema::create('categories', function (Blueprint $table) {
            // table id
            $table->id("id");
            // foreign id to users
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();            
            // category name
            $table->string('category_name');
            // colour for the categories
            $table->string('colour')->nullable();
            // when it was created
            $table->timestamps();
            // no categories can have the same name for a user
            $table->unique('user_id', 'category_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
