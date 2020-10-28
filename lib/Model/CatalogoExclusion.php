<?php

namespace Vantage\MX\Client\Model;
use \Vantage\MX\Client\ObjectSerializer;

class CatalogoExclusion
{
    
    const E0 = 'E0';
    const E1 = 'E1';
    const E2 = 'E2';
    const E3 = 'E3';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::E0,
            self::E1,
            self::E2,
            self::E3,
        ];
    }
}
