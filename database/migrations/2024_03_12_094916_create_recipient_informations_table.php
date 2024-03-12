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
        Schema::create('recipient_informations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_reg_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('attention_to')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipient_informations');
    }
};
