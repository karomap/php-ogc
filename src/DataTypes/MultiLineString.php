<?php

namespace Karomap\PHPOGC\DataTypes;

/**
 * OGC MultiLineString type.
 */
class MultiLineString extends Polygon
{
    /**
     * OGC type.
     *
     * @var string
     */
    protected $type = 'MULTILINESTRING';

    /**
     * MultiLineString constructor.
     *
     * @param  array    $linestrings
     * @param  int|null $srid
     * @return void
     */
    public function __construct(array $linestrings, $srid = null)
    {
        parent::__construct($linestrings, false, $srid);
    }
}
