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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->float('freight'); // -> Refers to volumetric weight = ((L * W * H in centimeters) / 6000 ) x number of packages 
            $table->string('order_number');
            $table->string('to_country');
            $table->string('to_city');
            $table->string('to_zip');
            $table->string('to_street');
            $table->float('total_price');
            $table->float('total_price_excl_vat');
            $table->boolean('is_paid');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
