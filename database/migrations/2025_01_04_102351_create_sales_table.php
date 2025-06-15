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
        Schema::create('sales', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->float('total_sale', 10,2)->nullable();
            $table->float('total_cash',10,2);
            $table->float('total_gpay',10,2);
            $table->float('collection',10,2);
            $table->float('essentials_amount',10,2)->nullable();
            $table->float('material_amount',10,2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
