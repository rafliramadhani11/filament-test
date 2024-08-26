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
        Schema::create('timbangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id');
            $table->foreign('anak_id')
                ->references('anaks')
                ->on('id')
                ->cascadeOnDelete();

            $table->tinyInteger('age');

            $table->decimal('height');
            $table->decimal('weight');
            $table->decimal('body_mass_index');

            $table->string('weight_status')->nullable();
            $table->string('height_status')->nullable();
            $table->string('imt_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timbangans');
    }
};
