<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetsControllerTest extends TestCase
{
    private const LIMIT = 1;

    public function test_getPets()
    {
        $response = $this->get('/api/pets');

        $response->assertStatus(200)
                ->assertJson([
                    'pets' => [
                        [
                            'id' => 1,
                            'name' => 'test',
                            'tag' => 'prueba'
                        ],
                        [
                            'id' => 2,
                            'name' => 'Tom',
                            'tag' => 'Gato'
                        ],
                    ]
                ]);
    }

    public function test_getLimitPets()
    {

        $response = $this->get('/api/pets?limit=' . self::LIMIT);

        $response->assertStatus(200)
                ->assertJson([
                    'pets' => [
                        [
                            'id' => 1,
                            'name' => 'test',
                            'tag' => 'prueba'
                        ],
                    ]
                ]);
    }
}
