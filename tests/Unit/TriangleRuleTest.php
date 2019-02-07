<?php

namespace Tests\Unit;

use App\Rules\TriangleRule;
use Tests\TestCase;

/**
 * @covers \App\Rules\TriangleRule
 */
class TriangleRuleTest extends TestCase
{
    /**
     * @var TriangleRule
     */
    private $rule;

    public function __construct()
    {
        parent::__construct();

        $this->rule = new TriangleRule();
    }

    /**
     * Test if a correct triangle passes the validation.
     */
    public function testValidTriangle()
    {
        $data = [
            "side1" => 3,
            "side2" => 4,
            "side3" => 5,
        ];

        $result = $this->rule->passes('triangle', $data);

        $this->assertTrue($result);
    }
}
