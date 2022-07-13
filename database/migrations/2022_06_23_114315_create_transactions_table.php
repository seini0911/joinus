<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reference')->nullable();
            $table->decimal('amount')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('isaccepted')->default(false);
            $table->foreignId('service_id')->constrained()->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('sprovider_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
