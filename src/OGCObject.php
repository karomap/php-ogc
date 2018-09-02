<?php

namespace Karomap\PHPOGC;

use CrEOF\Geo\WKB\Parser as WKBParser;
use CrEOF\Geo\WKT\Parser as WKTParser;

abstract class OGCObject
{
    private static $types_map = [
        'POINT' => 'Point',
        'MULTIPOINT' => 'MultiPoint',
        'LINESTRING' => 'LineString',
        'MULTILINESTRING' => 'MultiLineString',
        'POLYGON' => 'Polygon',
        'MULTIPOLYGON' => 'MultiPolygon',
        'GEOMETRYCOLLECTION' => 'GeometryCollection',
    ];

    private $wkt = null;
    private $wkb = null;

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        if(strtolower($name) == "wkt"){
            return ($this->wkt == null ? $this->wkt = $this->toWKT() : $this->wkt);

        }elseif(strtolower($name) == "wkb"){
            return ($this->wkb == null ? $this->wkb = $this->toWKB() : $this->wkb);
        }
    }

    /**
     * @param $type
     * @return string
     */
    private static function buildClassName($type)
    {
        return 'Karomap\PHPOGC\DataTypes\\' . self::$types_map[$type];
    }

    /**
     * @param $parsed
     * @return mixed
     */
    public static function buildOGCObject($parsed)
    {
        $typeClass = self::buildClassName($parsed['type']);

        if ($parsed['type'] == 'GEOMETRYCOLLECTION') {
            $ogcObjects = [];
            array_walk($parsed['value'], function($ogcArray) use(&$ogcObjects) {
                if (array_key_exists('type', $ogcArray)) {
                    $ogcClass = self::buildClassName($ogcArray['type']);
                    $ogcObjects[] = $ogcClass::fromArray($ogcArray['value']);
                }
            });
            return new $typeClass($ogcObjects);
        }

        return $typeClass::fromArray($parsed['value']);
    }

    /**
     * @param $wkt
     * @return mixed
     */
    public static function fromWKT($wkt)
    {
        $parser = new WKTParser();
        $geo = self::buildOGCObject($parser->parse($wkt));
        $geo->wkt = $wkt;
        return $geo;
    }

    /**
     * @return string
     */
    public function toWKT()
    {
        return "$this->type($this)";
    }

    /**
     * @throws \Exception
     */
    public function toWKB()
    {
        throw new \Exception('Not implemented');
    }

    /**
     * @param $wkb
     * @return mixed
     */
    public static function fromWKB($wkb)
    {
        $parser = new WKBParser();
        $geo = self::buildOGCObject($parser->parse($wkb));
        $geo->wkb = $wkb;
        return $geo;
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'value' => $this->toValueArray()
        ];
    }
}
