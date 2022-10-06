<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetPets extends TestCase
{
    private const LIMIT = 1;

    public function get_all_pets()
    {
        $response = $this->get('/api/pets');

        $response->assertStatus(200)
                ->assertJson([
                    'pets' => [
                        [
                            'id' => 1,
                            'name' => 'Jerry',
                            'tag' => 'raton'
                        ],
                        [
                            'id' => 2,
                            'name' => 'Tom',
                            'tag' => 'gato'
                        ],
                    ]
                ]);
    }

    public function get_limit_pets()
    {

        $response = $this->get('/api/pets?limit=' . self::LIMIT);

        $response->assertStatus(200)
                ->assertJson([
                    'pets' => [
                        [
                            'id' => 1,
                            'name' => 'Jerry',
                            'tag' => 'raton'
                        ],
                    ]
                ]);
    }
}
