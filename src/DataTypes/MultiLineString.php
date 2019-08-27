<?php

namespace Karomap\PHPOGC\DataTypes;

class MultiLineString extends Polygon
{
    protected $type = 'MULTILINESTRING';

    /**
     * MultiLineString constructor.
     *
     * @param array $linestrings
     * @param integer $srid
     */
    public function __construct(array $linestrings, $srid = null)
    {
        parent::__construct($linestrings, false, $srid);
    }
}
