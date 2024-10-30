<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum SexEnums:string
{
    case MEN = 'men';
    case WOMAN = 'woman';
    case NOT = 'not selected';

    public static function getArrays(): array
    {
        return [
            self::MEN,
            self::WOMAN,
            self::NOT,
        ];
    }
}
