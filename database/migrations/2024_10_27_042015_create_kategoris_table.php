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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id(); // bigint
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('name');
            $table->decimal('kadar_umum', 8, 2)->default(0);
            $table->decimal('kadar_siang', 8, 2)->default(0);
            $table->decimal('kadar_malam', 8, 2)->default(0);
            $table->integer('kapasiti')->nullable();
            $table->integer('kuantiti')->nullable();
            $table->string('status', 20)->default('available');
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('parent_id')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
