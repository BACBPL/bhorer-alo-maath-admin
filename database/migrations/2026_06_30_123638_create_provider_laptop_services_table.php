<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provider_laptop_services', function (Blueprint $table) {

            $table->id();

            $table->foreignId('provider_id')
                  ->constrained('service_providers')
                  ->cascadeOnDelete();

            $table->foreignId('laptop_service_id')
                  ->constrained('laptop_services')
                  ->cascadeOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provider_laptop_services');
    }
};