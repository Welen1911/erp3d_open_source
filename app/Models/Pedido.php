<?php

namespace App\Models;

use App\Observers\PedidoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([PedidoObserver::class])]
class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_nome',
        'produto_id',
        'quantidade',
        'status',
        'data_pedido',
        'preco_total',
        'estoque_atualizado',
        'observacoes',
    ];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
