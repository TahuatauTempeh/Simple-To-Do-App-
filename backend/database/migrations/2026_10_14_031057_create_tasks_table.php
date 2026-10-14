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
        Schema::create('tasks', function (Blueprint $table) {
            // table id
            $table->id('id');
            // user id
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // category id
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();            
            // name of the task
            $table->string('task_name');
            // description of the task
            $table->text('description')->nullable();
            // is the task done?
            $table->boolean('is_done')->default(false);
            // priority: 1-3 (1: urgent, 2: normal which is the default, 3: laidback)
            $table->unsignedTinyInteger('priority')->default(2);
            // due date
            $table->date('due_date')->nullable();
            // time stamp for completed when ticked
            $table->timestamp('completed_at')->nullable();
            // created at
            $table->timestamps();
            // index on users I think
            $table->index(['user_id', 'is_done']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
