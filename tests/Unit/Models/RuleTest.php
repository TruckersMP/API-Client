<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Rule;

class RuleTest extends TestCase
{
    use MockModelData;

    /**
     * A Rule model instance filled with mocked data.
     *
     * @var Rule
     */
    private Rule $rule;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('rule.json');

        $this->rule = new Rule($this->client, $data);
    }

    public function testItHasRules()
    {
        $this->assertSame('Rules', $this->rule->getRules());
    }

    public function testItHasARevision()
    {
        $this->assertSame(50, $this->rule->getRevision());
    }
}
