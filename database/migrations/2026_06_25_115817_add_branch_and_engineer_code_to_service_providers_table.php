<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_providers', function (Blueprint $table) {

            $table->unsignedBigInteger('branch_id')->nullable()->after('id');

            $table->string('engineer_code')->unique()->nullable()->after('branch_id');

        });
    }

    public function down(): void
    {
        Schema::table('service_providers', function (Blueprint $table) {

            $table->dropColumn([
                'branch_id',
                'engineer_code'
            ]);

        });
    }
};