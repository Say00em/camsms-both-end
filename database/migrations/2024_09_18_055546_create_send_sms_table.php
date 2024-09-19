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
        Schema::create('send_sms', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('mask_field')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('type');
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_sms');
    }
};
