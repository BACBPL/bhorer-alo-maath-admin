<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('file_url')->nullable();
            $table->string('file_path')->nullable();

            $table->string('location')->nullable();

            $table->enum('type', [
    'hero_banner',
    'offer_banner',
    'new_noteworthy_banner',
    'most_booked_banner'
]);

            $table->enum('status', [
                'Active',
                'Inactive'
            ])->default('Active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};