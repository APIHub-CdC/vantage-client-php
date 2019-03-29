<?php

namespace APIHub\Client\Model;

use \ArrayAccess;
use \APIHub\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    protected static $apihubModelName = 'Respuesta';

    protected static $apihubTypes = [
        'folio' => 'string',
        'folio_respuesta_cdc' => 'string',
        'segmentos' => 'string',
        'version_segmentos' => 'string'
    ];

    protected static $apihubFormats = [
        'folio' => null,
        'folio_respuesta_cdc' => null,
        'segmentos' => null,
        'version_segmentos' => null
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
        'folio_respuesta_cdc' => 'folioRespuestaCDC',
        'segmentos' => 'segmentos',
        'version_segmentos' => 'versionSegmentos'
    ];

    protected static $setters = [
        'folio' => 'setFolio',
        'folio_respuesta_cdc' => 'setFolioRespuestaCdc',
        'segmentos' => 'setSegmentos',
        'version_segmentos' => 'setVersionSegmentos'
    ];

    protected static $getters = [
        'folio' => 'getFolio',
        'folio_respuesta_cdc' => 'getFolioRespuestaCdc',
        'segmentos' => 'getSegmentos',
        'version_segmentos' => 'getVersionSegmentos'
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
        $this->container['folio_respuesta_cdc'] = isset($data['folio_respuesta_cdc']) ? $data['folio_respuesta_cdc'] : null;
        $this->container['segmentos'] = isset($data['segmentos']) ? $data['segmentos'] : null;
        $this->container['version_segmentos'] = isset($data['version_segmentos']) ? $data['version_segmentos'] : null;
    }

    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['folio'] === null) {
            $invalidProperties[] = "'folio' can't be null";
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

    public function getFolioRespuestaCdc()
    {
        return $this->container['folio_respuesta_cdc'];
    }

    public function setFolioRespuestaCdc($folio_respuesta_cdc)
    {
        $this->container['folio_respuesta_cdc'] = $folio_respuesta_cdc;

        return $this;
    }

    public function getSegmentos()
    {
        return $this->container['segmentos'];
    }

    public function setSegmentos($segmentos)
    {
        $this->container['segmentos'] = $segmentos;

        return $this;
    }

    public function getVersionSegmentos()
    {
        return $this->container['version_segmentos'];
    }

    public function setVersionSegmentos($version_segmentos)
    {
        $this->container['version_segmentos'] = $version_segmentos;

        return $this;
    }
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    function offsetGet($offset)
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
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


