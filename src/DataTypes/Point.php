<?php

namespace Karomap\PHPOGC\DataTypes;

use Karomap\PHPOGC\Exceptions\GeoSpatialException;
use Karomap\PHPOGC\OGCObject;

/**
 * OGC Point type.
 *
 * @property float $x Longitude.
 * @property float $y Latitude.
 */
class Point extends OGCObject
{
    /**
     * OGC type.
     *
     * @var string
     */
    protected $type = 'POINT';

    /**
     * Great circle distance providers.
     *
     * @var array
     */
    protected static $greatCircleProviders = ['haversine', 'vincenty'];

    /**
     * Logitude or X.
     *
     * @var float
     */
    public $lon;

    /**
     * Latitude or Y.
     *
     * @var float
     */
    public $lat;

    /**
     * Point address.
     *
     * @var string|null
     */
    public $address = null;

    /**
     * Point constructor.
     *
     * By default, a Point object could be instantiated from two elements, string or number are allowed:
     *      $point = new Point(1.123, 2.345)
     *      $point = new Point("1.1232", "2.345")
     *
     * @param  string|float $lon
     * @param  string|float $lat
     * @param  int|null     $srid
     * @return void
     */
    public function __construct($lon, $lat, $srid = null)
    {
        $this->lon = (float) $lon;
        $this->lat = (float) $lat;

        if ($srid) {
            $this->srid = $srid;
        }
    }

    /**
     * A Point could be instantiated from array containing a tuple of string|float lat, lon
     *      $point = Point::fromArray(["1.123", "2.345"])
     *      $point = Point::fromArray([1.123, 2.345]).
     *
     * @param  array                                          $points
     * @throws \Karomap\PHPOGC\Exceptions\GeoSpatialException
     * @return static
     */
    public static function fromArray(array $points)
    {
        if (count($points) != 2) {
            throw new GeoSpatialException('Error: wrong number of array elements, two needed');
        }

        return new self($points[0], $points[1]);
    }

    /**
     * A Point could be instantiated from a string with a delimiters, by default " " is used
     *      $point = Point::fromString("1.123 2.345")
     *      $point = Point::fromString("1.123: 2.345", ":").
     *
     * @param  string                                         $points
     * @param  string                                         $separator
     * @throws \Karomap\PHPOGC\Exceptions\GeoSpatialException
     * @return static
     */
    public static function fromString($points, $separator = ' ')
    {
        $p = explode($separator, trim($points));

        if (count($p) != 2) {
            throw new GeoSpatialException('Error creating Point from string '.$points);
        }

        return new self($p[0], $p[1]);
    }

    /*
    |--------------------------------------------------------------------------
    | Implement OGB Object interface and various casts utility
    |--------------------------------------------------------------------------
    */
    protected function toValueArray()
    {
        return [$this->lon, $this->lat];
    }

    public function __toString()
    {
        return "$this->lon $this->lat";
    }

    /*
    |--------------------------------------------------------------------------
    | Distance between points
    |--------------------------------------------------------------------------
    |
    | You can get the great circle distance (https://en.wikipedia.org/wiki/Great-circle_distance)
    | between two points  using one of the providers.
    |
    */

    /**
     * Calculate the distance between two points in meter.
     *
     * @param  static                                         $p1
     * @param  static                                         $p2
     * @param  string                                         $provider (optional) One of "haversine" or "vincenty". Default to "haversine"
     * @throws \Karomap\PHPOGC\Exceptions\GeoSpatialException
     * @return float
     */
    public static function distance(self $p1, self $p2, $provider = 'haversine')
    {
        switch ($provider) {
            case 'haversine':
                return self::haversineGreatCircleDistance($p1, $p2);

            case 'vincenty':
                return self::vincentyGreatCircleDistance($p1, $p2);

            default:
                throw new GeoSpatialException('Great circle distance provider not found, providers available: '.implode(', ', self::$greatCircleProviders));
        }
    }

    /**
     * @param  static $from
     * @param  static $to
     * @param  int    $earthRadius
     * @return float
     */
    private static function vincentyGreatCircleDistance(self $from, self $to, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $lonFrom = deg2rad($from->lon);
        $latFrom = deg2rad($from->lat);
        $lonTo = deg2rad($to->lon);
        $latTo = deg2rad($to->lat);
        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) + pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
        $angle = atan2(sqrt($a), $b);

        return $angle * $earthRadius;
    }

    /**
     * @param  static $from
     * @param  static $to
     * @param  int    $earthRadius
     * @return float
     */
    private static function haversineGreatCircleDistance(self $from, self $to, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $lonFrom = deg2rad($from->lon);
        $latFrom = deg2rad($from->lat);
        $lonTo = deg2rad($to->lon);
        $latTo = deg2rad($to->lat);
        $lonDelta = $lonTo - $lonFrom;
        $latDelta = $latTo - $latFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return $angle * $earthRadius;
    }

    /**
     * Get an object property.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        switch (strtolower($key)) {
            case 'x':
                return $this->lon;
                break;

            case 'y':
                return $this->lat;
                break;
        }

        return parent::__get($key);
    }
}
