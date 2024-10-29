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
        Schema::create('tempahan_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tempahan_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('tempahan_id')->references('id')->on('tempahans')->nullOnDelete();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempahan_items');
    }
};
