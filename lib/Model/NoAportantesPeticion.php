<?php

namespace Vantage\Client\Model;

use \ArrayAccess;
use \Vantage\Client\ObjectSerializer;

class NoAportantesPeticion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'NoAportantesPeticion';
    
    protected static $apihubTypes = [
        'folio' => 'string',
        'fecha_proceso' => 'string',
        'tipo_contrato' => '\Vantage\Client\Model\CatalogoContrato',
        'frecuencia_pago' => '\Vantage\Client\Model\CatalogoFrecuenciaPago',
        'dias_atraso' => 'int',
        'persona' => '\Vantage\Client\Model\PersonaPeticion'
    ];
    
    protected static $apihubFormats = [
        'folio' => null,
        'fecha_proceso' => null,
        'tipo_contrato' => null,
        'frecuencia_pago' => null,
        'dias_atraso' => 'int32',
        'persona' => null
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
        'tipo_contrato' => 'tipoContrato',
        'frecuencia_pago' => 'frecuenciaPago',
        'dias_atraso' => 'diasAtraso',
        'persona' => 'persona'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'fecha_proceso' => 'setFechaProceso',
        'tipo_contrato' => 'setTipoContrato',
        'frecuencia_pago' => 'setFrecuenciaPago',
        'dias_atraso' => 'setDiasAtraso',
        'persona' => 'setPersona'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'fecha_proceso' => 'getFechaProceso',
        'tipo_contrato' => 'getTipoContrato',
        'frecuencia_pago' => 'getFrecuenciaPago',
        'dias_atraso' => 'getDiasAtraso',
        'persona' => 'getPersona'
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
        $this->container['tipo_contrato'] = isset($data['tipo_contrato']) ? $data['tipo_contrato'] : null;
        $this->container['frecuencia_pago'] = isset($data['frecuencia_pago']) ? $data['frecuencia_pago'] : null;
        $this->container['dias_atraso'] = isset($data['dias_atraso']) ? $data['dias_atraso'] : null;
        $this->container['persona'] = isset($data['persona']) ? $data['persona'] : null;
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
        if ($this->container['tipo_contrato'] === null) {
            $invalidProperties[] = "'tipo_contrato' can't be null";
        }
        if ($this->container['frecuencia_pago'] === null) {
            $invalidProperties[] = "'frecuencia_pago' can't be null";
        }
        if ($this->container['dias_atraso'] === null) {
            $invalidProperties[] = "'dias_atraso' can't be null";
        }
        if ($this->container['persona'] === null) {
            $invalidProperties[] = "'persona' can't be null";
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
            throw new \InvalidArgumentException('invalid length for $folio when calling NoAportantesPeticion., must be smaller than or equal to 50.');
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
            throw new \InvalidArgumentException('invalid length for $fecha_proceso when calling NoAportantesPeticion., must be smaller than or equal to 10.');
        }
        $this->container['fecha_proceso'] = $fecha_proceso;
        return $this;
    }
    
    public function getTipoContrato()
    {
        return $this->container['tipo_contrato'];
    }
    
    public function setTipoContrato($tipo_contrato)
    {
        $this->container['tipo_contrato'] = $tipo_contrato;
        return $this;
    }
    
    public function getFrecuenciaPago()
    {
        return $this->container['frecuencia_pago'];
    }
    
    public function setFrecuenciaPago($frecuencia_pago)
    {
        $this->container['frecuencia_pago'] = $frecuencia_pago;
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
    
    public function getPersona()
    {
        return $this->container['persona'];
    }
    
    public function setPersona($persona)
    {
        $this->container['persona'] = $persona;
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
