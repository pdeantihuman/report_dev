<?php

namespace Tests\Unit;

use App\Issue;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IssueFactoryTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     */
    public function it_can_create_valid_issue(){
        factory(Issue::class)->create();
        $this->assertTrue(true);
    }
}
