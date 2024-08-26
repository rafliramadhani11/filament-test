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
        Schema::create('anaks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orangtua_id');
            $table->foreign('orangtua_id')
                ->references('id')
                ->on('orangtuas')
                ->cascadeOnDelete();

            $table->string('name');
            $table->enum('gender', ['Laki - Laki', 'Perempuan']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaks');
    }
};
