<?php

namespace Tests\Feature\Resource;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestIssues extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testStore(){
        $response = $this->withoutMiddleware()->post(route('issues.store'), [
            'alley' => $this->faker->numberBetween(5,9),
            'room' => $this->faker->numberBetween(401,407),
            'description' => $this->faker->text(100),
        ]);
        $response->assertStatus(200);
    }

    public function testBatchStore(){
        foreach (range(0,100) as $i){
            $this->testStore();
        }
    }
}
