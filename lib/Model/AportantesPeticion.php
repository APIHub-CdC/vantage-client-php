<?php

namespace Vantage\MX\Client\Model;

use \ArrayAccess;
use \Vantage\MX\Client\ObjectSerializer;

class AportantesPeticion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $VantageModelName = 'AportantesPeticion';
    
    protected static $VantageTypes = [
        'folio' => 'string',
        'numero_cuenta' => 'string',
        'dias_atraso' => 'int',
        'tipo_contrato' => '\Vantage\MX\Client\Model\CatalogoContrato'
    ];
    
    protected static $VantageFormats = [
        'folio' => null,
        'numero_cuenta' => null,
        'dias_atraso' => 'int32',
        'tipo_contrato' => null
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
        'numero_cuenta' => 'numeroCuenta',
        'dias_atraso' => 'diasAtraso',
        'tipo_contrato' => 'tipoContrato'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'numero_cuenta' => 'setNumeroCuenta',
        'dias_atraso' => 'setDiasAtraso',
        'tipo_contrato' => 'setTipoContrato'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'numero_cuenta' => 'getNumeroCuenta',
        'dias_atraso' => 'getDiasAtraso',
        'tipo_contrato' => 'getTipoContrato'
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
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio'] = isset($data['folio']) ? $data['folio'] : null;
        $this->container['numero_cuenta'] = isset($data['numero_cuenta']) ? $data['numero_cuenta'] : null;
        $this->container['dias_atraso'] = isset($data['dias_atraso']) ? $data['dias_atraso'] : null;
        $this->container['tipo_contrato'] = isset($data['tipo_contrato']) ? $data['tipo_contrato'] : null;
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
        if ((mb_strlen($this->container['folio']) < 1)) {
            $invalidProperties[] = "invalid value for 'folio', the character length must be bigger than or equal to 1.";
        }
        if ($this->container['numero_cuenta'] === null) {
            $invalidProperties[] = "'numero_cuenta' can't be null";
        }
        if ((mb_strlen($this->container['numero_cuenta']) > 50)) {
            $invalidProperties[] = "invalid value for 'numero_cuenta', the character length must be smaller than or equal to 50.";
        }
        if ((mb_strlen($this->container['numero_cuenta']) < 1)) {
            $invalidProperties[] = "invalid value for 'numero_cuenta', the character length must be bigger than or equal to 1.";
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
        if ((mb_strlen($folio) < 1)) {
            throw new \InvalidArgumentException('invalid length for $folio when calling AportantesPeticion., must be bigger than or equal to 1.');
        }
        $this->container['folio'] = $folio;
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
        if ((mb_strlen($numero_cuenta) < 1)) {
            throw new \InvalidArgumentException('invalid length for $numero_cuenta when calling AportantesPeticion., must be bigger than or equal to 1.');
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
    
    public function getTipoContrato()
    {
        return $this->container['tipo_contrato'];
    }
    
    public function setTipoContrato($tipo_contrato)
    {
        $this->container['tipo_contrato'] = $tipo_contrato;
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
