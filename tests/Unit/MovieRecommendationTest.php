<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieRecommendationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRecommendationTest()
    {
        $this->json('POST', '/api/movie', ['genre' => 'animation','time'=>"12:00"])
             ->assertSee('[{"print_string":"Zootopia, Showing at 07 pm","rating":92},{"print_string":"Shaun The Sheep, Showing at 07 pm","rating":80}]');
    }
}
