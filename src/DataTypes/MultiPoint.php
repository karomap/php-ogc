<?php

namespace Karomap\PHPOGC\DataTypes;

class MultiPoint extends LineString
{
    protected $type = 'MULTIPOINT';

    /**
     * MultiPoint constructor.
     *
     * @param array $points
     * @param integer $srid
     */
    public function __construct(array $points, $srid = null)
    {
        parent::__construct($points, $srid);
    }
}
