<?php

namespace Vantage\MX\Client\Model;

use \ArrayAccess;
use \Vantage\MX\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $VantageModelName = 'Respuesta';
    
    protected static $VantageTypes = [
        'folio' => 'string',
        'folio_consulta' => 'string',
        'numero_cuenta' => 'string',
        'calificacion' => 'string',
        'code_exclusion' => '\Vantage\MX\Client\Model\CatalogoExclusion'
    ];
    
    protected static $VantageFormats = [
        'folio' => null,
        'folio_consulta' => null,
        'numero_cuenta' => null,
        'calificacion' => null,
        'code_exclusion' => null
    ];
    
    public static function VantageTypes()
    {
        return self::$VantageTypes;
    }
    
    public static function VantageFormats()
    {
        return self::$VantageFormats;
    }
    
    protected static $attributeMap = [
        'folio' => 'folio',
        'folio_consulta' => 'folioConsulta',
        'numero_cuenta' => 'numeroCuenta',
        'calificacion' => 'calificacion',
        'code_exclusion' => 'codeExclusion'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'folio_consulta' => 'setFolioConsulta',
        'numero_cuenta' => 'setNumeroCuenta',
        'calificacion' => 'setCalificacion',
        'code_exclusion' => 'setCodeExclusion'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'folio_consulta' => 'getFolioConsulta',
        'numero_cuenta' => 'getNumeroCuenta',
        'calificacion' => 'getCalificacion',
        'code_exclusion' => 'getCodeExclusion'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$VantageModelName;
    }
    const CALIFICACION_A = 'A';
    const CALIFICACION_B = 'B';
    const CALIFICACION_C = 'C';
    const CALIFICACION_D = 'D';
    const CALIFICACION_E = 'E';
    const CALIFICACION_F = 'F';
    
    
    
    public function getCalificacionAllowableValues()
    {
        return [
            self::CALIFICACION_A,
            self::CALIFICACION_B,
            self::CALIFICACION_C,
            self::CALIFICACION_D,
            self::CALIFICACION_E,
            self::CALIFICACION_F,
        ];
    }
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio'] = isset($data['folio']) ? $data['folio'] : null;
        $this->container['folio_consulta'] = isset($data['folio_consulta']) ? $data['folio_consulta'] : null;
        $this->container['numero_cuenta'] = isset($data['numero_cuenta']) ? $data['numero_cuenta'] : null;
        $this->container['calificacion'] = isset($data['calificacion']) ? $data['calificacion'] : null;
        $this->container['code_exclusion'] = isset($data['code_exclusion']) ? $data['code_exclusion'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        $allowedValues = $this->getCalificacionAllowableValues();
        if (!is_null($this->container['calificacion']) && !in_array($this->container['calificacion'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'calificacion', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }
        if (!is_null($this->container['calificacion']) && (mb_strlen($this->container['calificacion']) > 1)) {
            $invalidProperties[] = "invalid value for 'calificacion', the character length must be smaller than or equal to 1.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFolio()
    {
        return $this->container['folio'];
    }
    
    public function setFolio($folio)
    {
        $this->container['folio'] = $folio;
        return $this;
    }
    
    public function getFolioConsulta()
    {
        return $this->container['folio_consulta'];
    }
    
    public function setFolioConsulta($folio_consulta)
    {
        $this->container['folio_consulta'] = $folio_consulta;
        return $this;
    }
    
    public function getNumeroCuenta()
    {
        return $this->container['numero_cuenta'];
    }
    
    public function setNumeroCuenta($numero_cuenta)
    {
        $this->container['numero_cuenta'] = $numero_cuenta;
        return $this;
    }
    
    public function getCalificacion()
    {
        return $this->container['calificacion'];
    }
    
    public function setCalificacion($calificacion)
    {
        $allowedValues = $this->getCalificacionAllowableValues();
        if (!is_null($calificacion) && !in_array($calificacion, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'calificacion', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        if (!is_null($calificacion) && (mb_strlen($calificacion) > 1)) {
            throw new \InvalidArgumentException('invalid length for $calificacion when calling Respuesta., must be smaller than or equal to 1.');
        }
        $this->container['calificacion'] = $calificacion;
        return $this;
    }
    
    public function getCodeExclusion()
    {
        return $this->container['code_exclusion'];
    }
    
    public function setCodeExclusion($code_exclusion)
    {
        $this->container['code_exclusion'] = $code_exclusion;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
