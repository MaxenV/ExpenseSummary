<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('name');
            $table->double('price_one');
            $table->double('quantity');
            $table->unsignedBigInteger('type');
            $table->dateTime('date')->nullable();

            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('type')->references('id')->on('types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};