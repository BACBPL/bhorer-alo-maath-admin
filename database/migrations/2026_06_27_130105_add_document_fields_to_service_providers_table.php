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
        Schema::table('service_providers', function (Blueprint $table) {

            // Location
            $table->string('state')->nullable()->after('provider_type');

            // Profile
            $table->string('profile_photo')->nullable()->after('address');

            // Aadhaar
            $table->string('aadhaar_number')->nullable();
            $table->string('aadhaar_card')->nullable();

            // PAN
            $table->string('pan_number')->nullable();
            $table->string('pan_card')->nullable();

            // Driving License
            $table->string('driving_license_number')->nullable();
            $table->string('driving_license')->nullable();

            // Bank Details
            $table->string('bank_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_document')->nullable();

            // Other Documents
            $table->string('police_verification')->nullable();
            $table->string('experience_certificate')->nullable();
            $table->string('other_document')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_providers', function (Blueprint $table) {

            $table->dropColumn([
                'state',
                'profile_photo',

                'aadhaar_number',
                'aadhaar_card',

                'pan_number',
                'pan_card',

                'driving_license_number',
                'driving_license',

                'bank_name',
                'account_holder_name',
                'account_number',
                'ifsc_code',
                'bank_document',

                'police_verification',
                'experience_certificate',
                'other_document'
            ]);

        });
    }
};