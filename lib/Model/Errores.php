<?php

namespace Vantage\MX\Client\Model;

use \ArrayAccess;
use \Vantage\MX\Client\ObjectSerializer;

class Errores implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $VantageModelName = 'Errores';
    
    protected static $VantageTypes = [
        'errores' => '\Vantage\MX\Client\Model\Error[]'
    ];
    
    protected static $VantageFormats = [
        'errores' => null
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
        'errores' => 'errores'
    ];
    
    protected static $setters = [
        'errores' => 'setErrores'
    ];
    
    protected static $getters = [
        'errores' => 'getErrores'
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
        $this->container['errores'] = isset($data['errores']) ? $data['errores'] : null;
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
    
    public function getErrores()
    {
        return $this->container['errores'];
    }
    
    public function setErrores($errores)
    {
        $this->container['errores'] = $errores;
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
