<?php

namespace Vantage\MX\Client\Model;
use \Vantage\MX\Client\ObjectSerializer;

class CatalogoProducto
{
    
    const R = 'R';
    const F = 'F';
    const O = 'O';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::R,
            self::F,
            self::O,
        ];
    }
}
