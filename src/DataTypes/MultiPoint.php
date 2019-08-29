<?php

namespace Karomap\PHPOGC\DataTypes;

/**
 * OGC MultiPoint type
 */
class MultiPoint extends LineString
{
    /**
     * OGC type.
     *
     * @var string
     */
    protected $type = 'MULTIPOINT';

    /**
     * MultiPoint constructor.
     *
     * @param array $points
     * @param int $srid
     * @return void
     */
    public function __construct(array $points, $srid = null)
    {
        parent::__construct($points, $srid);
    }
}
