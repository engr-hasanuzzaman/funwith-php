<?php

use PHPUnit\Framework\TestCase;
use App\Utility;

class TestUtility extends TestCase
{
    /**
     * the following test will execute for the each array elements which will be used as
     * parameter data source
     * @dataProvider sumProvider
     * */ 
    public function testSum(int $a1, int $a2, int $expect)
    {
        $this->assertEquals(Utility::Sum($a1, $a2), $expect);
    }

    // each element from the inner array will be passed as a argument on the target test
    public function sumProvider()
    {
        return [
            [1, 1, 2],
            [-1, -1, -2],
            [1, -1, 0],
            [-1, 99, 98],
        ];
    }
}