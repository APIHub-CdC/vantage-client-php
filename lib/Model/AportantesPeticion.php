<?php

namespace Vantage\MX\Client\Model;

use \ArrayAccess;
use \Vantage\MX\Client\ObjectSerializer;

class AportantesPeticion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'AportantesPeticion';
    
    protected static $apihubTypes = [
        'folio' => 'string',
        'fecha_proceso' => 'string',
        'numero_cuenta' => 'string',
        'dias_atraso' => 'int'
    ];
    
    protected static $apihubFormats = [
        'folio' => null,
        'fecha_proceso' => null,
        'numero_cuenta' => null,
        'dias_atraso' => 'int32'
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
        'dias_atraso' => 'diasAtraso'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'fecha_proceso' => 'setFechaProceso',
        'numero_cuenta' => 'setNumeroCuenta',
        'dias_atraso' => 'setDiasAtraso'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'fecha_proceso' => 'getFechaProceso',
        'numero_cuenta' => 'getNumeroCuenta',
        'dias_atraso' => 'getDiasAtraso'
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
        $this->container['dias_atraso'] = isset($data['dias_atraso']) ? $data['dias_atraso'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['folio'] === null) {
            $invalidProperties[] = "'folio' can't be null";
        }
        if ((mb_strlen($this->container['folio']) > 50)) {
            $invalidProperties[] = "invalid value for 'folio', the character length must be smaller than or equal to 50.";
        }
        if ($this->container['fecha_proceso'] === null) {
            $invalidProperties[] = "'fecha_proceso' can't be null";
        }
        if ((mb_strlen($this->container['fecha_proceso']) > 10)) {
            $invalidProperties[] = "invalid value for 'fecha_proceso', the character length must be smaller than or equal to 10.";
        }
        if ($this->container['numero_cuenta'] === null) {
            $invalidProperties[] = "'numero_cuenta' can't be null";
        }
        if ((mb_strlen($this->container['numero_cuenta']) > 50)) {
            $invalidProperties[] = "invalid value for 'numero_cuenta', the character length must be smaller than or equal to 50.";
        }
        if ($this->container['dias_atraso'] === null) {
            $invalidProperties[] = "'dias_atraso' can't be null";
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
        if ((mb_strlen($folio) > 50)) {
            throw new \InvalidArgumentException('invalid length for $folio when calling AportantesPeticion., must be smaller than or equal to 50.');
        }
        $this->container['folio'] = $folio;
        return $this;
    }
    
    public function getFechaProceso()
    {
        return $this->container['fecha_proceso'];
    }
    
    public function setFechaProceso($fecha_proceso)
    {
        if ((mb_strlen($fecha_proceso) > 10)) {
            throw new \InvalidArgumentException('invalid length for $fecha_proceso when calling AportantesPeticion., must be smaller than or equal to 10.');
        }
        $this->container['fecha_proceso'] = $fecha_proceso;
        return $this;
    }
    
    public function getNumeroCuenta()
    {
        return $this->container['numero_cuenta'];
    }
    
    public function setNumeroCuenta($numero_cuenta)
    {
        if ((mb_strlen($numero_cuenta) > 50)) {
            throw new \InvalidArgumentException('invalid length for $numero_cuenta when calling AportantesPeticion., must be smaller than or equal to 50.');
        }
        $this->container['numero_cuenta'] = $numero_cuenta;
        return $this;
    }
    
    public function getDiasAtraso()
    {
        return $this->container['dias_atraso'];
    }
    
    public function setDiasAtraso($dias_atraso)
    {
        $this->container['dias_atraso'] = $dias_atraso;
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
