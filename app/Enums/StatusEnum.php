<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;

enum StatusEnum: string implements EnumInterface
{
    case Pendente = 'Pendente';
    case EmProducao = 'Em Produção';
    case Finalizado = 'Finalizado';
    case Cancelado = 'Cancelado';


    public static function casesNames(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[$case->value] = $case->name;
        }
        return $cases;
    }
}
