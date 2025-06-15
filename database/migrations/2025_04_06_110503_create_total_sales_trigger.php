<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
          CREATE TRIGGER after_inserting_sales
          BEFORE INSERT on sales
          FOR EACH ROW
          BEGIN 
             SET NEW.total_sale = NEW.total_cash + NEW.total_gpay + NEW.collection + NEW.essentials_amount;
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       DB::unprepared('DROP TRIGGER IF EXISTS after_inserting_sales');
    }
};
