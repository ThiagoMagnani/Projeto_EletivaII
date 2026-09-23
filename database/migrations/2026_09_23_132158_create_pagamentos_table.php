<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->id('id_pagamento');
            $table->decimal('valor', 10, 2);
            $table->date('data_pagamento')->nullable();
            $table->string('forma_pagamento', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
