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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // assuming you have a users table
            $table->text('note')->nullable();
            $table->text('delivery_address');
            $table->dateTime('delivery_time');
            $table->timestamps();
        });

        Schema::create('prescription_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prescription_id')->constrained();
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_images');
        Schema::dropIfExists('prescriptions');
    }
};
