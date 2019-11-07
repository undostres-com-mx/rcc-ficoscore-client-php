<?php

namespace RCCFicoScore\Client\Model;

use \ArrayAccess;
use \RCCFicoScore\Client\ObjectSerializer;

class Score implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Score';
    
    protected static $apihubTypes = [
        'nombre_score' => 'string',
        'score' => 'string',
        'razones' => '\RCCFicoScore\Client\Model\Razon[]'
    ];
    
    protected static $apihubFormats = [
        'nombre_score' => null,
        'score' => null,
        'razones' => null
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
        'nombre_score' => 'nombreScore',
        'score' => 'score',
        'razones' => 'razones'
    ];
    
    protected static $setters = [
        'nombre_score' => 'setNombreScore',
        'score' => 'setScore',
        'razones' => 'setRazones'
    ];
    
    protected static $getters = [
        'nombre_score' => 'getNombreScore',
        'score' => 'getScore',
        'razones' => 'getRazones'
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
        $this->container['nombre_score'] = isset($data['nombre_score']) ? $data['nombre_score'] : null;
        $this->container['score'] = isset($data['score']) ? $data['score'] : null;
        $this->container['razones'] = isset($data['razones']) ? $data['razones'] : null;
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
    
    public function getNombreScore()
    {
        return $this->container['nombre_score'];
    }
    
    public function setNombreScore($nombre_score)
    {
        $this->container['nombre_score'] = $nombre_score;
        return $this;
    }
    
    public function getScore()
    {
        return $this->container['score'];
    }
    
    public function setScore($score)
    {
        $this->container['score'] = $score;
        return $this;
    }
    
    public function getRazones()
    {
        return $this->container['razones'];
    }
    
    public function setRazones($razones)
    {
        $this->container['razones'] = $razones;
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
