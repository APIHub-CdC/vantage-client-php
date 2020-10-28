<?php

namespace Vantage\MX\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function VantageTypes();
    
    public static function VantageFormats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
