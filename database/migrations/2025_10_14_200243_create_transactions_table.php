<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete(); 
            $table->string('name');
            $table->string('email');
            $table->integer('amount');
            $table->string('status')->default('pending'); // pending, paid, failed
            $table->string('snap_token')->nullable();
            $table->timestamps();

            $table->unique('order_id'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
