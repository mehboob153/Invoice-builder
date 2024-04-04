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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->decimal('net_due', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending');
            $table->string('invoice_description')->nullable();
            $table->string('line_item')->nullable();
            $table->string('line_item_description')->nullable();
            $table->decimal('hours_worked', 8, 2)->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->string('logo')->nullable();
            $table->string('company_name')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
