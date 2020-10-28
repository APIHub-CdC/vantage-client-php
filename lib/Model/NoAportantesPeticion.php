<?php

namespace Vantage\MX\Client\Model;

use \ArrayAccess;
use \Vantage\MX\Client\ObjectSerializer;

class NoAportantesPeticion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $VantageModelName = 'NoAportantesPeticion';
    
    protected static $VantageTypes = [
        'folio' => 'string',
        'tipo_producto' => '\Vantage\MX\Client\Model\CatalogoProducto',
        'tipo_contrato' => '\Vantage\MX\Client\Model\CatalogoContrato',
        'frecuencia_pago' => '\Vantage\MX\Client\Model\CatalogoFrecuenciaPago',
        'dias_atraso' => 'int',
        'persona' => '\Vantage\MX\Client\Model\PersonaPeticion',
        'numero_cuenta' => 'string',
        'fecha_apertura' => 'string',
        'saldo_actual' => 'float'
    ];
    
    protected static $VantageFormats = [
        'folio' => null,
        'tipo_producto' => null,
        'tipo_contrato' => null,
        'frecuencia_pago' => null,
        'dias_atraso' => 'int32',
        'persona' => null,
        'numero_cuenta' => null,
        'fecha_apertura' => 'yyyy-MM-dd',
        'saldo_actual' => 'float'
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
        'tipo_producto' => 'tipoProducto',
        'tipo_contrato' => 'tipoContrato',
        'frecuencia_pago' => 'frecuenciaPago',
        'dias_atraso' => 'diasAtraso',
        'persona' => 'persona',
        'numero_cuenta' => 'numeroCuenta',
        'fecha_apertura' => 'fechaApertura',
        'saldo_actual' => 'saldoActual'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'tipo_producto' => 'setTipoProducto',
        'tipo_contrato' => 'setTipoContrato',
        'frecuencia_pago' => 'setFrecuenciaPago',
        'dias_atraso' => 'setDiasAtraso',
        'persona' => 'setPersona',
        'numero_cuenta' => 'setNumeroCuenta',
        'fecha_apertura' => 'setFechaApertura',
        'saldo_actual' => 'setSaldoActual'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'tipo_producto' => 'getTipoProducto',
        'tipo_contrato' => 'getTipoContrato',
        'frecuencia_pago' => 'getFrecuenciaPago',
        'dias_atraso' => 'getDiasAtraso',
        'persona' => 'getPersona',
        'numero_cuenta' => 'getNumeroCuenta',
        'fecha_apertura' => 'getFechaApertura',
        'saldo_actual' => 'getSaldoActual'
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
        $this->container['tipo_producto'] = isset($data['tipo_producto']) ? $data['tipo_producto'] : null;
        $this->container['tipo_contrato'] = isset($data['tipo_contrato']) ? $data['tipo_contrato'] : null;
        $this->container['frecuencia_pago'] = isset($data['frecuencia_pago']) ? $data['frecuencia_pago'] : null;
        $this->container['dias_atraso'] = isset($data['dias_atraso']) ? $data['dias_atraso'] : null;
        $this->container['persona'] = isset($data['persona']) ? $data['persona'] : null;
        $this->container['numero_cuenta'] = isset($data['numero_cuenta']) ? $data['numero_cuenta'] : null;
        $this->container['fecha_apertura'] = isset($data['fecha_apertura']) ? $data['fecha_apertura'] : null;
        $this->container['saldo_actual'] = isset($data['saldo_actual']) ? $data['saldo_actual'] : null;
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
        if ($this->container['tipo_producto'] === null) {
            $invalidProperties[] = "'tipo_producto' can't be null";
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
        if ($this->container['numero_cuenta'] === null) {
            $invalidProperties[] = "'numero_cuenta' can't be null";
        }
        if ((mb_strlen($this->container['numero_cuenta']) > 50)) {
            $invalidProperties[] = "invalid value for 'numero_cuenta', the character length must be smaller than or equal to 50.";
        }
        if ((mb_strlen($this->container['numero_cuenta']) < 1)) {
            $invalidProperties[] = "invalid value for 'numero_cuenta', the character length must be bigger than or equal to 1.";
        }
        if ($this->container['fecha_apertura'] === null) {
            $invalidProperties[] = "'fecha_apertura' can't be null";
        }
        if ((mb_strlen($this->container['fecha_apertura']) > 10)) {
            $invalidProperties[] = "invalid value for 'fecha_apertura', the character length must be smaller than or equal to 10.";
        }
        if ((mb_strlen($this->container['fecha_apertura']) < 10)) {
            $invalidProperties[] = "invalid value for 'fecha_apertura', the character length must be bigger than or equal to 10.";
        }
        if ($this->container['saldo_actual'] === null) {
            $invalidProperties[] = "'saldo_actual' can't be null";
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
        if ((mb_strlen($folio) < 1)) {
            throw new \InvalidArgumentException('invalid length for $folio when calling NoAportantesPeticion., must be bigger than or equal to 1.');
        }
        $this->container['folio'] = $folio;
        return $this;
    }
    
    public function getTipoProducto()
    {
        return $this->container['tipo_producto'];
    }
    
    public function setTipoProducto($tipo_producto)
    {
        $this->container['tipo_producto'] = $tipo_producto;
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
    
    public function getNumeroCuenta()
    {
        return $this->container['numero_cuenta'];
    }
    
    public function setNumeroCuenta($numero_cuenta)
    {
        if ((mb_strlen($numero_cuenta) > 50)) {
            throw new \InvalidArgumentException('invalid length for $numero_cuenta when calling NoAportantesPeticion., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($numero_cuenta) < 1)) {
            throw new \InvalidArgumentException('invalid length for $numero_cuenta when calling NoAportantesPeticion., must be bigger than or equal to 1.');
        }
        $this->container['numero_cuenta'] = $numero_cuenta;
        return $this;
    }
    
    public function getFechaApertura()
    {
        return $this->container['fecha_apertura'];
    }
    
    public function setFechaApertura($fecha_apertura)
    {
        if ((mb_strlen($fecha_apertura) > 10)) {
            throw new \InvalidArgumentException('invalid length for $fecha_apertura when calling NoAportantesPeticion., must be smaller than or equal to 10.');
        }
        if ((mb_strlen($fecha_apertura) < 10)) {
            throw new \InvalidArgumentException('invalid length for $fecha_apertura when calling NoAportantesPeticion., must be bigger than or equal to 10.');
        }
        $this->container['fecha_apertura'] = $fecha_apertura;
        return $this;
    }
    
    public function getSaldoActual()
    {
        return $this->container['saldo_actual'];
    }
    
    public function setSaldoActual($saldo_actual)
    {
        $this->container['saldo_actual'] = $saldo_actual;
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
