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
        Schema::create('sub_task_memmbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subtask_id')->nullable();
            $table->unsignedBigInteger('memmber_id')->nullable();
            $table->foreign('subtask_id')->references('id')->on('sub_tasks');
            $table->foreign('memmber_id')->references('id')->on('memmbers');
            $table->enum('status',['On','Off'])->default('Off');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_task_memmbers');
    }
};
