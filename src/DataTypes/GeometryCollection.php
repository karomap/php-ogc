<?php

namespace Karomap\PHPOGC\DataTypes;

use Karomap\PHPOGC\Exceptions\GeoSpatialException;
use Karomap\PHPOGC\OGCObject;

/**
 * Class GeometryCollection
 * @package php-ogc
 *
 * TODO: implements fromString and fromArray methods
 */
class GeometryCollection extends OGCObject implements \Countable
{
    protected $type = 'GEOMETRYCOLLECTION';

    public $geometries = [];

    /**
     * GeometryCollection constructor.
     *
     * @param OGCObject[] $ogcobjects
     * @param integer $srid
     * @throws GeospatialException
     */
    public function __construct(array $ogcobjects, $srid = null)
    {
        array_walk($ogcobjects, function ($ogcobject) {
            if (!$ogcobject instanceof OGCObject)
                throw new GeoSpatialException('A GeometryCollection must be constructed with an array of OGCObject objects');
        });
        $this->geometries = $ogcobjects;

        if ($srid)
            $this->srid = $srid;
    }

    /*
    |--------------------------------------------------------------------------
    | Implement OGB Object interface and various casts utility
    |--------------------------------------------------------------------------
    */
    protected function toValueArray()
    {
        return array_map(function ($ogcobject) {
            return [
                'type' => $ogcobject->type,
                'value' => $ogcobject->toArray()
            ];
        }, $this->geometries);
    }

    public function __toString()
    {
        return implode(',', array_map(function ($g) {
            return $g->toWKT();
        }, $this->geometries));
    }

    /**
     * Countable interface implementation
     *
     * @return int
     */
    public function count()
    {
        return sizeof($this->geometries);
    }
}
