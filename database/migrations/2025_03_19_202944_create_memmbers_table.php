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
        Schema::create('memmbers', function (Blueprint $table) {
            $table->id();
            
            // تعريف الأعمدة
            $table->uuid('company_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('sub_tasks_id')->nullable();
            
            // ربط المفاتيح الخارجية بعد تعريفها
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            $table->foreign('sub_tasks_id')->references('id')->on('sub_tasks')->onDelete('set null');
            
            // باقي الأعمدة
            $table->string('image')->nullable();
            $table->string('number')->nullable();
            $table->string('address')->nullable();
            $table->string('name');
    
            $table->timestamps();
        });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memmbers');
    }
};
