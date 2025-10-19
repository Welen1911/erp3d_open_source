<?php

namespace App\Observers;

use App\Enums\StatusEnum;
use App\Models\Pedido;

class PedidoObserver
{
    public function saving(Pedido $pedido): void
    {
        if ($pedido->status === StatusEnum::Finalizado->value) {
            $filamento = $pedido->produto->filamento;
            $uso_total = $pedido->quantidade * $pedido->produto->peso_uso;
            $filamento->peso_restante -= $uso_total;
            $filamento->save();

            $pedido->estoque_atualizado = true;
        }
    }
}
