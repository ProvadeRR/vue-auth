<?php

namespace Tests\Feature\auth;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{

    use DatabaseMigrations;


    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->withoutExceptionHandling();
    }


    public function test_register()
    {

        $data = [
            'name' => 'Stanislav',
            'email' => 'stas.karnoza@gmail.com',
            'password' => 'Stanislav',
            'password_confirm' => 'Stanislav'
        ];

        $response = $this->post('/api/auth/registration', $data);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message'
            ]);

    }
}
