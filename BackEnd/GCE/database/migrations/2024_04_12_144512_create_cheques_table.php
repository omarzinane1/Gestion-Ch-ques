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
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->float('montant');
            $table->date('date_reception');
            $table->enum('statut', ['paye', 'impaye'])->default('impaye');
            $table->enum('etat', ['DFC', 'SC', 'SJ'])->default('DFC');
            $table->string('numero_cheque');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
              ->references('id')
              ->on('clients')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheques');
    }
};
