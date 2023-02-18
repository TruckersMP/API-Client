<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use TruckersMP\APIClient\Models\Model;

class ModelTest extends TestCase
{
    /** @test */
    public function it_can_get_value()
    {
        $data = ['id' => 1, 'name' => 'Test'];

        $model = Mockery::mock(Model::class, [], [$this->client, $data])->makePartial();
        $model->shouldAllowMockingProtectedMethods();

        $this->assertSame(1, $model->getValue('id'));
        $this->assertSame('Test', $model->getValue('name'));
        $this->assertNull($model->getValue('invalid'));
    }

    /** @test */
    public function it_can_get_nested_value()
    {
        $data = [
            'other' => 'data',
            'nested' => ['field' => 'test'],
            'nested_more' => ['text' => 'foo'],
        ];

        $model = Mockery::mock(Model::class, [], [$this->client, $data])->makePartial();
        $model->shouldAllowMockingProtectedMethods();

        $this->assertSame('test', $model->getValue('nested.field'));
        $this->assertSame('foo', $model->getValue('nested_more.text'));
        $this->assertNull($model->getValue('nested_more.field'));
        $this->assertNull($model->getValue('nested.field.field'));
    }

    /** @test */
    public function it_defaults_invalid_key()
    {
        $data = ['id' => 1, 'name' => 'Test'];

        $model = Mockery::mock(Model::class, [], [$this->client, $data])->makePartial();
        $model->shouldAllowMockingProtectedMethods();

        $this->assertSame(5, $model->getValue('invalid', 5));
        $this->assertSame('test', $model->getValue('invalid', 'test'));
        $this->assertSame('foo', $model->getValue('id.invalid', 'foo'));

        $data = $model->getValue('invalid', ['key' => 'value']);

        $this->assertIsArray($data);
        $this->assertArrayHasKey('key', $data);
    }

    /** @test */
    public function it_can_convert_model_to_array()
    {
        $data = ['id' => 1, 'name' => 'Test'];

        $model = Mockery::mock(Model::class, [], [$this->client, $data])->makePartial();

        $this->assertIsArray($model->toArray());
        $this->assertArrayHasKey('id', $model->toArray());
        $this->assertArrayHasKey('name', $model->toArray());
    }
}
