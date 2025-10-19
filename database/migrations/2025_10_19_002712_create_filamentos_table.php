<?php

use App\Enums\MaterialEnum;
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
        Schema::create('filamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('material', MaterialEnum::cases());
            $table->decimal('peso_total', 8, 2);
            $table->decimal('peso_restante', 8, 2);
            $table->string('cor');
            $table->string('fornecedor')->nullable();
            $table->decimal('preco_por_g', 8, 2)->nullable();
            $table->decimal('preco_compra', 8, 2);
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filamentos');
    }
};
