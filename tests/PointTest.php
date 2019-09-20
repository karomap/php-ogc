<?php

namespace Tests;

use Karomap\PHPOGC\DataTypes\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testPointDistance()
    {
        $p1 = new Point(12.4525363, 41.934077); // olimpico
        $p2 = new Point(12.4637237, 41.7480619); // trigoria

        $vDistance = Point::distance($p1, $p2, 'vincenty');
        $this->assertEquals(0, bccomp('20704.687222767', $vDistance));

        $hDistance = Point::distance($p1, $p2);
        $this->assertEquals(0, bccomp('20704.687222768', $hDistance));
    }
}
