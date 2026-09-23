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
        Schema::create('agendamento', function (Blueprint $table) {
            $table->id('id_agendamento');
            $table->foreignId('id_aluno')->constrained('aluno', 'id_aluno');
            $table->foreignId('id_servico')->constrained('servico', 'id_servico');
            $table->foreignId('id_instituicao')->constrained('instituicao', 'id_instituicao');
            $table->foreignId('id_pagamento')->nullable()->constrained('pagamento', 'id_pagamento');
            $table->date('data');
            $table->time('horario');
            $table->string('status', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento');
    }
};
