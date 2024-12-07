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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('property_type_id')->constrained('property_types');
            $table->foreignId('offer_type_id')->constrained('offer_types');
            $table->integer('price');
            $table->string('contact_name');
            $table->string('token');
            $table->string('phone');
            $table->bigInteger('area');
            $table->bigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
