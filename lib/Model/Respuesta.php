<?php

namespace Vantage\MX\Client\Model;

use \ArrayAccess;
use \Vantage\MX\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Respuesta';
    
    protected static $apihubTypes = [
        'folio' => 'string',
        'fecha_proceso' => 'string',
        'numero_cuenta' => 'string',
        'calificacion' => 'string'
    ];
    
    protected static $apihubFormats = [
        'folio' => null,
        'fecha_proceso' => null,
        'numero_cuenta' => null,
        'calificacion' => null
    ];
    
    public static function apihubTypes()
    {
        return self::$apihubTypes;
    }
    
    public static function apihubFormats()
    {
        return self::$apihubFormats;
    }
    
    protected static $attributeMap = [
        'folio' => 'folio',
        'fecha_proceso' => 'fechaProceso',
        'numero_cuenta' => 'numeroCuenta',
        'calificacion' => 'calificacion'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'fecha_proceso' => 'setFechaProceso',
        'numero_cuenta' => 'setNumeroCuenta',
        'calificacion' => 'setCalificacion'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'fecha_proceso' => 'getFechaProceso',
        'numero_cuenta' => 'getNumeroCuenta',
        'calificacion' => 'getCalificacion'
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
        return self::$apihubModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio'] = isset($data['folio']) ? $data['folio'] : null;
        $this->container['fecha_proceso'] = isset($data['fecha_proceso']) ? $data['fecha_proceso'] : null;
        $this->container['numero_cuenta'] = isset($data['numero_cuenta']) ? $data['numero_cuenta'] : null;
        $this->container['calificacion'] = isset($data['calificacion']) ? $data['calificacion'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
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
    
    public function getFechaProceso()
    {
        return $this->container['fecha_proceso'];
    }
    
    public function setFechaProceso($fecha_proceso)
    {
        $this->container['fecha_proceso'] = $fecha_proceso;
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
        $this->container['calificacion'] = $calificacion;
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
