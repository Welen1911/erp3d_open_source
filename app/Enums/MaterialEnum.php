<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;

enum MaterialEnum: string implements EnumInterface
{
    case PLA = 'PLA';
    case ABS = 'ABS';
    case PETG = 'PETG';
    case TPU = 'TPU';
    case NYLON = 'NYLON';
    case RESINA = 'RESINA';


    public static function casesNames(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[$case->value] = $case->name;
        }
        return $cases;
    }
}
