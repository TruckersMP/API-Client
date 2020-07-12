<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\APIClient\Models\Rule;

class RuleTest extends TestCase
{
    /** @test */
    public function it_can_get_the_rules()
    {
        $rules = $this->rules();

        $this->assertInstanceOf(Rule::class, $rules);
    }

    /** @test */
    public function it_has_the_rules()
    {
        $rules = $this->rules();

        $this->assertIsString($rules->getRules());
    }

    /** @test */
    public function it_has_the_revision()
    {
        $rules = $this->rules();

        $this->assertIsInt($rules->getRevision());
    }
}
