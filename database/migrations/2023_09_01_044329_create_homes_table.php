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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('cb_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('petitioner')->nullable();
            $table->string('account_name')->nullable();
            $table->string('accused_name')->nullable();
            $table->string('branch_name_code')->nullable();
            $table->date('case_filing_date')->nullable();
            $table->string('case_number')->nullable();
            $table->string('hc_division')->nullable();
            $table->string('case_category')->nullable();
            $table->string('case_type')->nullable();
            $table->string('present_status')->nullable();
            $table->string('request_type')->nullable();
            $table->string('district')->nullable();
            $table->string('suit_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
