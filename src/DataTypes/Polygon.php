<?php

namespace Karomap\PHPOGC\DataTypes;

use Karomap\PHPOGC\Exceptions\GeoSpatialException;
use Karomap\PHPOGC\OGCObject;

/**
 * OGC Polygon type.
 */
class Polygon extends OGCObject implements \Countable
{
    /**
     * OGC type.
     *
     * @var string
     */
    protected $type = 'POLYGON';

    /**
     * LineString collection.
     *
     * @var \Karomap\PHPOGC\DataTypes\LineString[]
     */
    public $linestrings = [];

    /**
     * Polygon constructor. A Polygon must be constructed with at least 1 closed linestring.
     *
     * @param  array $linestrings
     * @param  bool  $circular_check
     * @param  int   $srid
     * @return void
     */
    public function __construct(array $linestrings, $circular_check = true, $srid = null)
    {
        array_walk($linestrings, [$this, 'is_linestring']);
        // check that all array elements are LineString instances, and that all of them are closed (circular)
        if ($circular_check) {
            array_walk($linestrings, [$this, 'is_circular_linestring']);
        }
        $this->linestrings = $linestrings;

        if ($srid) {
            $this->srid = $srid;
        }
    }

    /**
     * A Polygon could be instantiated with an array like this:.
     *
     * [ [[x,y],[x,y],[x,y]], [[x,y],[x,y],[x,y]], ..., [[x,y],[x,y],[x,y]] ]
     *
     * @param  array  $linestrings
     * @return static
     */
    public static function fromArray(array $linestrings)
    {
        $parsed_linestrings = array_map(function ($linestring) {
            return LineString::fromArray($linestring);
        }, $linestrings);

        return new static($parsed_linestrings);
    }

    /**
     * A Polygon could be instantiated using a string containing linestrings.
     * es. "lat lon, lat lon; lat lon, lat lon; lat lon, lat lon".
     *
     * @param  string                                         $linestrings
     * @param  string                                         $linestrings_separator
     * @param  string                                         $points_separator
     * @param  string                                         $coords_separator
     * @throws \Karomap\PHPOGC\Exceptions\GeoSpatialException
     * @return static
     */
    public static function fromString($linestrings, $linestrings_separator = ';', $points_separator = ',', $coords_separator = ' ')
    {
        $separators = [$linestrings_separator, $points_separator, $coords_separator];
        if (count($separators) != count(array_unique($separators))) {
            throw new GeoSpatialException('Error: separators must be different');
        }
        $parsed_linestrings = array_map(function ($linestring) use ($points_separator, $coords_separator) {
            return LineString::fromString($linestring, $points_separator, $coords_separator);
        }, explode($linestrings_separator, trim($linestrings)));

        return new static($parsed_linestrings);
    }

    /*
    |--------------------------------------------------------------------------
    | Implement OGB Object interface and various casts utility
    |--------------------------------------------------------------------------
    */

    protected function toValueArray()
    {
        return array_map(function ($linestring) {
            return $linestring->toArray();
        }, $this->linestrings);
    }

    public function __toString()
    {
        return implode(',', array_map(function ($l) {
            return "($l)";
        }, $this->linestrings));
    }

    private function is_circular_linestring($linestring)
    {
        if (!$linestring->isCircular()) {
            throw new GeoSpatialException('A LineString instance that compose a Polygon must be circular (min 4 points, first and last equals).');
        }
    }

    private function is_linestring($linestring)
    {
        if (!$linestring instanceof LineString) {
            throw new GeoSpatialException('A Polygon instance must be composed by LineString only.');
        }
    }

    /**
     * Countable interface implementation.
     *
     * @return int
     */
    public function count()
    {
        return count($this->linestrings);
    }
}
