<?php

namespace Karomap\PHPOGC\DataTypes;

use Karomap\PHPOGC\Exceptions\GeoSpatialException;
use Karomap\PHPOGC\OGCObject;

class MultiPolygon extends OGCObject implements \Countable
{
    protected $type = 'MULTIPOLYGON';

    /**
     * Polygons
     *
     * @var Polygon[]
     */
    public $polygons = [];

    /**
     * MultiPolygon constructor.
     * @param Polygon[] $polygons
     * @param integer $srid
     * @throws GeoSpatialException
     */
    public function __construct(array $polygons, $srid = null)
    {
        if (empty($polygons))
            throw new GeoSpatialException('A MultiPolygon cannot be empty');

        array_walk($polygons, function ($polygon) {
            if (!$polygon instanceof Polygon)
                throw new GeoSpatialException('A MultiPolygon must be instantiated with an array of Polygon objects');
        });

        $this->polygons = $polygons;

        if ($srid)
            $this->srid = $srid;
    }

    /**
     * @param array $polygons
     * @return MultiPolygon
     */
    public static function fromArray(array $polygons)
    {
        $parsed_polygons = array_map(function ($polygon) {
            return Polygon::fromArray($polygon);
        }, $polygons);
        return new static($parsed_polygons);
    }

    /**
     * @param $polygons
     * @param string $polygons_separator
     * @param string $linestrings_separator
     * @param string $points_separator
     * @param string $coords_separator
     * @return MultiPolygon
     * @throws GeoSpatialException
     */
    public static function fromString($polygons, $polygons_separator = '|', $linestrings_separator = ';', $points_separator = ',', $coords_separator = ' ')
    {
        $separators = [$polygons_separator, $linestrings_separator, $points_separator, $coords_separator];
        if (sizeof($separators) != sizeof(array_unique($separators)))
            throw new GeoSpatialException('Error: separators must be different');

        $parsed_polygons = array_map(function ($polygon) use ($linestrings_separator, $points_separator, $coords_separator) {
            return Polygon::fromString($polygon, $linestrings_separator, $points_separator, $coords_separator);
        }, explode($polygons_separator, trim($polygons)));

        return new static($parsed_polygons);
    }

    /*
    |--------------------------------------------------------------------------
    | Implement OGB Object interface and various casts utility
    |--------------------------------------------------------------------------
    */
    protected function toValueArray()
    {
        return array_map(function ($polygon) {
            return $polygon->toArray();
        }, $this->polygons);
    }

    public function __toString()
    {
        return implode(',', array_map(function ($p) {
            return "($p)";
        }, $this->polygons));
    }

    /**
     * Countable interface implementation
     *
     * @return int
     */
    public function count()
    {
        return count($this->polygons);
    }
}
