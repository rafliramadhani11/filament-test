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
        Schema::create('orangtuas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')
                ->references('id')
                ->on('kotas')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('job');
            $table->enum('type', ['Ayah', 'Ibu', 'Wali']);
            $table->enum('gender', ['Laki - Laki', 'Perempuan']);
            $table->string('date_of_birth');
            $table->string('phone_number')->unique();
            $table->string('district');
            $table->string('sub_district');
            $table->string('address');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orangtuas');
    }
};
