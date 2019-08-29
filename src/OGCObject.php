<?php

namespace Karomap\PHPOGC;

use CrEOF\Geo\WKB\Parser as WKBParser;
use CrEOF\Geo\WKT\Parser as WKTParser;

/**
 * Abstract class represent Open Geospatial Consortium (OGC) geometry type
 */
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

    /**
     * WKT
     *
     * @var string|null
     */
    private $wkt = null;

    /**
     * WKB
     *
     * @var string|null
     */
    private $wkb = null;

    /**
     * OGC type.
     *
     * @var string
     */
    protected $type = '';

    /**
     * Spatial Reference System Identifier (SRID).
     *
     * @var int
     */
    public $srid = 0;

    /**
     * Get an object property.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (strtolower($name) == 'wkt') {
            return ($this->wkt == null ? $this->wkt = $this->toWKT() : $this->wkt);
        } elseif (strtolower($name) == 'wkb') {
            return ($this->wkb == null ? $this->wkb = $this->toWKB() : $this->wkb);
        }
    }

    /**
     * Get PHP class name for the given OGC type.
     *
     * @param string $type
     * @return string
     */
    private static function buildClassName($type)
    {
        return 'Karomap\PHPOGC\DataTypes\\' . self::$types_map[$type];
    }

    /**
     * Create an OGCObject instance from parsed WKB/WKT.
     *
     * @param array $parsed
     * @return OGCObject
     */
    public static function buildOGCObject($parsed)
    {
        $typeClass = self::buildClassName($parsed['type']);

        if ($parsed['type'] == 'GEOMETRYCOLLECTION') {
            $ogcObjects = [];
            array_walk($parsed['value'], function ($ogcArray) use (&$ogcObjects) {
                if (array_key_exists('type', $ogcArray)) {
                    $ogcClass = self::buildClassName($ogcArray['type']);
                    $ogcObjects[] = $ogcClass::fromArray($ogcArray['value']);
                }
            });
            $instance = new $typeClass($ogcObjects);
        } else {
            $instance = $typeClass::fromArray($parsed['value']);
        }

        $instance->srid = $parsed['srid'];

        return $instance;
    }

    /**
     * Create an OGCObject instance from WKT.
     *
     * @param string $wkt
     * @param int|null $srid
     * @return OGCObject
     */
    public static function fromWKT($wkt, $srid = null)
    {
        $parser = new WKTParser();
        $geo = self::buildOGCObject($parser->parse($wkt));
        $geo->wkt = $wkt;
        if ($srid) {
            $geo->srid = $srid;
        }
        return $geo;
    }

    /**
     * Create an OGCObject instance from WKB.
     *
     * @param $wkb
     * @param int|null $srid
     * @return OGCObject
     */
    public static function fromWKB($wkb, $srid = null)
    {
        $parser = new WKBParser();
        $geo = self::buildOGCObject($parser->parse($wkb));
        $geo->wkb = $wkb;
        if ($srid) {
            $geo->srid = $srid;
        }
        return $geo;
    }

    /**
     * Get WKT representation of the instance.
     *
     * @return string
     */
    public function toWKT()
    {
        return "$this->type($this)";
    }

    /**
     * (not implemented)
     * Get WKB representation of the instance.
     *
     * @throws \Exception
     */
    public function toWKB()
    {
        throw new \Exception('Not implemented');
    }

    /**
     * Array representation of instance coordinates.
     *
     * @return array
     */
    abstract protected function toValueArray();

    /**
     * Array representation of the instance.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->type,
            'value' => $this->toValueArray()
        ];
    }

    /**
     * String representation of the instance.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->wkt ?? $this->toWKT();
    }
}
