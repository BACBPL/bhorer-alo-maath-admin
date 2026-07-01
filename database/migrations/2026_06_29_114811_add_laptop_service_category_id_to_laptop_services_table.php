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
        Schema::table('laptop_services', function (Blueprint $table) {

            $table->unsignedBigInteger('laptop_service_category_id')
                  ->nullable()
                  ->after('id');

            $table->foreign('laptop_service_category_id')
                  ->references('id')
                  ->on('laptop_service_categories')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laptop_services', function (Blueprint $table) {

            $table->dropForeign(['laptop_service_category_id']);

            $table->dropColumn('laptop_service_category_id');

        });
    }
};