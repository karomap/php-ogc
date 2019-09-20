<?php

namespace Karomap\PHPOGC\DataTypes;

use Karomap\PHPOGC\Exceptions\GeoSpatialException;
use Karomap\PHPOGC\OGCObject;

/**
 * OGC GeometryCollection type.
 *
 * TODO: implements fromString and fromArray methods
 */
class GeometryCollection extends OGCObject implements \Countable
{
    /**
     * OGC type.
     *
     * @var string
     */
    protected $type = 'GEOMETRYCOLLECTION';

    /**
     * OGCObject collection.
     *
     * @var \Karomap\PHPOGC\OGCObject[]
     */
    public $geometries = [];

    /**
     * GeometryCollection constructor.
     *
     * @param  \Karomap\PHPOGC\OGCObject[]                    $ogcobjects
     * @param  int|null                                       $srid
     * @throws \Karomap\PHPOGC\Exceptions\GeoSpatialException
     * @return void
     */
    public function __construct(array $ogcobjects, $srid = null)
    {
        array_walk($ogcobjects, function ($ogcobject) {
            if (!$ogcobject instanceof OGCObject) {
                throw new GeoSpatialException('A GeometryCollection must be constructed with an array of OGCObject objects');
            }
        });
        $this->geometries = $ogcobjects;

        if ($srid) {
            $this->srid = $srid;
        }
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
                'value' => $ogcobject->toArray(),
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
     * Countable interface implementation.
     *
     * @return int
     */
    public function count()
    {
        return count($this->geometries);
    }
}
