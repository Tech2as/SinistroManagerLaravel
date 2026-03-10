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
        Schema::create('sinistros', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('oficina_id')
                ->constrained('oficina_profiles')
                ->cascadeOnDelete();

            $table->foreignId('regulador_id')
            ->constrained('regulador_profiles')
            ->cascadeOnDelete();

            $table->string('chassi');
            $table->decimal('valor_reparo', 10, 2);
            $table->boolean('salvado');

            $table->enum('status', [
                    'criado',
                    'em_analise',
                    'aprovado',
                    'reprovado',
                    'finalizado'
                ])->default('criado');
                
            $table->date('data_sinistro');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinistros');
    }
};
