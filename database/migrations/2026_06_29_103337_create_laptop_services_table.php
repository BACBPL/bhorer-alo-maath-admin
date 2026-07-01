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
        Schema::create('laptop_services', function (Blueprint $table) {

            $table->id();

            $table->enum('service_type', [
                'Rent',
                'AMC',
                'Repair'
            ]);

            $table->string('service_name');

            $table->text('description')->nullable();

            $table->decimal('price',10,2)->default(0);

            $table->string('image')->nullable();

            $table->enum('status',[
                'Active',
                'Inactive'
            ])->default('Active');

            $table->boolean('is_featured')->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptop_services');
    }
};
