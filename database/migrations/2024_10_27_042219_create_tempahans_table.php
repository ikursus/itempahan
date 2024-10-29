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
        Schema::create('tempahans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id'); // Sama seperti kategori_id
            $table->date('tarikh_tempahan')->nullable();
            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_akhir')->nullable();
            $table->time('masa_tempahan')->nullable();
            $table->time('masa_mula')->nullable();
            $table->time('masa_akhir')->nullable();
            $table->string('status', '20')->default('pending');
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('pelanggan_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempahans');
    }
};
