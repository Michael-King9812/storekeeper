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
        Schema::create('daily_sale_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->decimal('total_amount_due', 15, 2);
            $table->decimal('total_amount_paid', 15, 2);
            $table->decimal('cash', 15, 2)->default('0');
            $table->decimal('credit', 15, 2)->default('0');
            $table->string('pos')->default('0');
            $table->decimal('shortage_amount', 15, 0)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_sale_summaries');
    }
};
