<?php

namespace Vantage\MX\Client\Model;
use \Vantage\MX\Client\ObjectSerializer;

class CatalogoFrecuenciaPago
{
    
    const A = 'A';
    const B = 'B';
    const C = 'C';
    const D = 'D';
    const E = 'E';
    const M = 'M';
    const N = 'N';
    const Q = 'Q';
    const R = 'R';
    const S = 'S';
    const T = 'T';
    const U = 'U';
    const V = 'V';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::A,
            self::B,
            self::C,
            self::D,
            self::E,
            self::M,
            self::N,
            self::Q,
            self::R,
            self::S,
            self::T,
            self::U,
            self::V,
        ];
    }
}
