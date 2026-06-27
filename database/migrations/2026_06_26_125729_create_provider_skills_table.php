<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('provider_skills', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('provider_id');

            $table->unsignedBigInteger('skill_id');

            $table->timestamps();

            $table->foreign('provider_id')
                  ->references('id')
                  ->on('service_providers')
                  ->onDelete('cascade');

            $table->foreign('skill_id')
                  ->references('id')
                  ->on('skills')
                  ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('provider_skills');
    }
};