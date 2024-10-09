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
        Schema::create('comment', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->foreignId('product_id')->constrained('product');        
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('create_ad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
