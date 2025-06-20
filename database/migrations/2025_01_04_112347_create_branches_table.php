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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->string('branch_name')->nullable();
              $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('pincode');
            $table->string('land_mark');
            $table->timestamps();
    
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
