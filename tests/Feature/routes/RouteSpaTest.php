<?php

namespace Tests\Feature\routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteSpaTest extends TestCase
{
    public function test_main_page()
    {
        $response = $this->get('/');
        $response->assertViewIs('welcome');
    }

    public function test_any_page(){
        $response = $this->get('/any-page');
        $response->assertViewIs('welcome');
    }

    public function test_finnaly(){
        $response = $this->get('/lodo/update');
        $response->assertViewIs('welcome');
    }
}
