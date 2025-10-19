<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'material',
        'peso_total',
        'peso_restante',
        'cor',
        'fornecedor',
        'preco_por_g',
        'preco_compra',
        'observacoes',
    ];
}
