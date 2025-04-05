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
        Schema::create('shop_details', function (Blueprint $table) {
            $table->id();
            $table->string('branch_unique_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('shop_name');
            $table->string('shop_type')->nullable();
            $table->integer('no_of_branches');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('pincode');
            $table->string('land_mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_details');
    }
};
