<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table) {

            $table->unsignedBigInteger('category_id')->after('id');
            $table->unsignedBigInteger('sub_category_id')->after('category_id');
            $table->unsignedBigInteger('service_id')->after('sub_category_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {

            $table->dropForeign(['category_id']);
            $table->dropForeign(['sub_category_id']);
            $table->dropForeign(['service_id']);

            $table->dropColumn([
                'category_id',
                'sub_category_id',
                'service_id'
            ]);

        });
    }
};