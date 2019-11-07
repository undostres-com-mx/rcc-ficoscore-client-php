<?php

namespace RCCFicoScore\Client\Model;

use \ArrayAccess;
use \RCCFicoScore\Client\ObjectSerializer;

class Razon implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Razon';
    
    protected static $apihubTypes = [
        'clave' => '\RCCFicoScore\Client\Model\CatalogoRazones',
        'descripcion' => 'string'
    ];
    
    protected static $apihubFormats = [
        'clave' => null,
        'descripcion' => null
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
        'clave' => 'clave',
        'descripcion' => 'descripcion'
    ];
    
    protected static $setters = [
        'clave' => 'setClave',
        'descripcion' => 'setDescripcion'
    ];
    
    protected static $getters = [
        'clave' => 'getClave',
        'descripcion' => 'getDescripcion'
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
        $this->container['clave'] = isset($data['clave']) ? $data['clave'] : null;
        $this->container['descripcion'] = isset($data['descripcion']) ? $data['descripcion'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['clave'] === null) {
            $invalidProperties[] = "'clave' can't be null";
        }
        if ($this->container['descripcion'] === null) {
            $invalidProperties[] = "'descripcion' can't be null";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getClave()
    {
        return $this->container['clave'];
    }
    
    public function setClave($clave)
    {
        $this->container['clave'] = $clave;
        return $this;
    }
    
    public function getDescripcion()
    {
        return $this->container['descripcion'];
    }
    
    public function setDescripcion($descripcion)
    {
        $this->container['descripcion'] = $descripcion;
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
