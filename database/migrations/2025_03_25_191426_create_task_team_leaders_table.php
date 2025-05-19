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
        Schema::create('task_team_leaders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('teamleader_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('teamleader_id')->references('id')->on('team_leaders');
            $table->enum('status',['On','off'])->default('Off');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_team_leaders');
    }
};
