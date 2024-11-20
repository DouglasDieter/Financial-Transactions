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
        Schema::create('cadastrotransacoes', function (Blueprint $table) {
            $table->id(); // Chave primária.
            $table->string('descricao'); // Descrição da transação.
            $table->enum('tipo', ['receita', 'despesa']); // Tipo: receita ou despesa.
            $table->decimal('valor', 10, 2)->default(0); // Valor da transação.
            $table->string('categoria'); // Categoria: Aluguel, Pagamento, etc.
            $table->date('data'); // Coluna 'data' para armazenar a data.
            $table->timestamps(); // Mantém os campos "created_at" e "updated_at"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastrotransacoes');
    }
};
