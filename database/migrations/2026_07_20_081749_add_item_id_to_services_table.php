<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {

            $table->unsignedBigInteger('item_id')->nullable()->after('subcategory_id');

            $table->foreign('item_id')
                  ->references('id')
                  ->on('items')
                  ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {

            $table->dropForeign(['item_id']);
            $table->dropColumn('item_id');

        });
    }
};