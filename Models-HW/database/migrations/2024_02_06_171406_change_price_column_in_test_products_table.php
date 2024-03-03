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
        Schema::table('test_products', function (Blueprint $table) {
            $table->decimal('price', 15, 2, true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_products', function (Blueprint $table) {
            $table->float('price', 8, 2, true)->change();
        });
    }
};
