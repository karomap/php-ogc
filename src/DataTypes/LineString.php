<?php

namespace Karomap\PHPOGC\DataTypes;

use Karomap\PHPOGC\Exceptions\GeoSpatialException;
use Karomap\PHPOGC\OGCObject;

/**
 * OGC LineString type.
 */
class LineString extends OGCObject implements \Countable
{
    /**
     * OGC type.
     *
     * @var string
     */
    protected $type = 'LINESTRING';

    /**
     * Point collection.
     *
     * @var \Karomap\PHPOGC\DataTypes\Point[]
     */
    public $points = [];

    /**
     * LineString constructor.
     *
     * A LineString must be instantiate with a Points array
     * es. [new Point(lon, lat), new Point(lon, lat)]
     *
     * @param  \Karomap\PHPOGC\DataTypes\Point[]              $points
     * @param  int|null                                       $srid
     * @throws \Karomap\PHPOGC\Exceptions\GeoSpatialException
     * @return void
     */
    public function __construct(array $points, $srid = null)
    {
        if (count($points) < 2) {
            throw new GeoSpatialException('A LineString instance must be composed by at least 2 points.');
        }
        $this->points = array_map(function ($p) {
            if (!$p instanceof Point) {
                throw new GeoSpatialException('A LineString instance must be constructed directly with Points array only.');
            }

            return $p;
        }, $points);

        if ($srid) {
            $this->srid = $srid;
        }
    }

    /**
     * A Linestring could be constructed with an array of points-array.
     *
     * es. [[lon, lat], [lon, lat], [lon, lat], ..]
     *
     * @param  array  $points
     * @return static
     */
    public static function fromArray(array $points)
    {
        $parsed_points = array_map(function ($p) {
            if (!is_array($p) or count($p) != 2) {
                throw new GeoSpatialException('Error: array of array containing lat, lon expected.');
            }

            return new Point($p[0], $p[1]);
        }, $points);

        return new static($parsed_points);
    }

    /**
     * A Linestring could be instantiated using a string where points are divided by a "," and coordinates
     * are divided by " ". Separators must be different.
     * es. "lon lat, lon lat".
     *
     * @param  string                                         $points
     * @param  string                                         $points_separator
     * @param  string                                         $coords_separator
     * @throws \Karomap\PHPOGC\Exceptions\GeoSpatialException
     * @return static
     */
    public static function fromString($points, $points_separator = ',', $coords_separator = ' ')
    {
        if ($points_separator == $coords_separator) {
            throw new GeoSpatialException('Error: separators must be different');
        }
        $parsed_points = array_map(function ($p) use ($coords_separator) {
            return Point::fromString($p, $coords_separator);
        }, explode($points_separator, trim($points)));

        return new static($parsed_points);
    }

    /*
    |--------------------------------------------------------------------------
    | Implement OGB Object interface and various casts utility
    |--------------------------------------------------------------------------
    */

    protected function toValueArray()
    {
        return array_map(function ($point) {
            return $point->toArray();
        }, $this->points);
    }

    public function __toString()
    {
        return implode(',', array_map(function ($p) {
            return (string) $p;
        }, $this->points));
    }

    /**
     * Check if the LineString is circular, that is the first and the last Point are the same.
     *
     * @return bool
     */
    public function isCircular()
    {
        return count($this->points) > 3 && $this->points[0] == $this->points[count($this->points) - 1];
    }

    /**
     * Return the lenght of the linestring expressed in meters.
     *
     * @param  string $provider (optional) One of "haversine" or "vincenty". Default to "haversine"
     * @return int
     */
    public function lenght($provider = 'haversine')
    {
        $length = 0;
        for ($i = 0; $i < count($this) - 2; $i++) {
            $length += Point::distance($this->points[$i], $this->points[$i + 1], $provider);
        }

        return $length;
    }

    /**
     * Insert a Point into the LineString.
     *
     * @param \Karomap\PHPOGC\DataTypes\Point $p
     */
    public function insertPoint(Point $p)
    {
        // Se il punto è già presente nella LineString non faccio modifiche
        if (array_search($p, $this->points) !== false) {
            return;
        }

        $threshold = 0.02;
        for ($i = 0; $i < count($this->points) - 2; $i++) {
            $distance = Point::distance($this->points[$i], $p) + Point::distance($p, $this->points[$i + 1]);
            $step_distance = Point::distance($this->points[$i], $this->points[$i + 1]);

            if ($distance > $step_distance - ($step_distance * $threshold) && $distance < ($step_distance + $step_distance * $threshold)) {
                $newpoints = array_slice($this->points, 0, $i + 1, true);
                $newpoints = array_merge($newpoints, [$p]);
                $newpoints = array_merge($newpoints, array_slice($this->points, $i + 1, count($this->points) - ($i + 1)));
                $this->points = $newpoints;
                break;
            }
        }
    }

    /**
     * Split the LineString object on the given Point, if present, and returns a tuple (array with two object) composed
     * by Points, LineStrings or null..
     *
     * If the given Point is the first of the LineString, it returns the Point as first element of the tuple, and the
     * remaining LineString as second element of the tuple. Same behavior if the Point is the last, but the returned
     * tuple is reversed.
     *
     * If the LineString is composed by two Points and the given Point is one of those, we get a tuple of two Points.
     *
     * If the Point is not present, we get a tuple composed by the LineString itself and a null element in the second
     * position of the tuple.
     *
     *
     * es.
     * given the LineString(Point(1,1), Point(2,2), Point(3,3), Point(4,4), Point(5,5)) split by Point(2,2) we obtain
     * - an array with two LineString
     * 1) LineString(Point(1,1), Point(2,2))
     * 2) LineString(Point(2,2), Point(3,3), Point(4,4), Point(5,5))
     *
     * es.
     * given the LineString(Point(1,1), Point(2,2), Point(3,3), Point(4,4), Point(5,5)) split by Point(1,1) we obtain
     * - an array with a Point and a LineString
     * 1) Point(1,1)
     * 2) LineString(Point(1,1), Point(2,2), Point(3,3), Point(4,4), Point(5,5))
     *
     * es.
     * given the LineString(Point(1,1), Point(2,2), Point(3,3), Point(4,4), Point(5,5)) split by Point(5,5) we obtain
     * - an array with a Point and a LineString
     * 1) LineString(Point(1,1), Point(2,2), Point(3,3), Point(4,4), Point(5,5))
     * 2) Point(5,5)
     *
     * es.
     * given the LineString(Point(1,1), Point(2,2)) split by Point(1,1) we obtain
     * - an array with a Point and a LineString
     * 1) Point(1,1)
     * 2) LineString(Point(1,1), Point(2,2))
     *
     * es.
     * given the LineString(Point(1,1), Point(2,2)) split by Point(5,5) we obtain
     * - an array with a LineString and a null element
     * 1) LineString(Point(1,1), Point(2,2))
     * 2) null
     *
     * @param  \Karomap\PHPOGC\DataTypes\Point $split
     * @return array
     */
    public function split(Point $split)
    {
        // if the point split is the first or the last, we returns the whole linestring
        reset($this->points);
        if ($this->points[0] == $split) {
            return [$split, $this];
        }

        if ($this->points[count($this->points) - 1] == $split) {
            return [$this, $split];
        }

        $splitted = [];
        $position = array_search($split, $this->points);

        // if the split point is not found, we return the whole linestring
        if ($position === false) {
            return [$this, null];
        } else {
            array_push($splitted, new self(array_slice($this->points, 0, $position + 1)));
            array_push($splitted, new self(array_slice($this->points, $position, count($this->points) - $position)));
        }

        return $splitted;
    }

    /**
     * @param  static $l1
     * @param  static $l2
     * @return array
     */
    public static function diff(self $l1, self $l2)
    {
        $diffs = array_diff($l1->points, $l2->points);
        foreach ($diffs as $diff) {
            $pos = array_search($diff, $l1->points);
            echo "Il point $diff è presente solo nella prima LineString, in posizione $pos\n";
        }

        return $diffs;
    }

    /**
     * Countable interface implementation.
     *
     * @return int
     */
    public function count()
    {
        return count($this->points);
    }
}
