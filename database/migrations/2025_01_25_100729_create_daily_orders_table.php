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
        Schema::create('daily_orders', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->string('cake_in_kg');
            $table->string('flavour');
            $table->integer('total_amount');
            $table->integer('advanced_amount');
            $table->integer('balanced_amount');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->dateTime('delivery_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_orders');
    }
};
