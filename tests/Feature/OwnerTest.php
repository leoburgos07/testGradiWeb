<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Owner;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class OwnerTest extends TestCase
{
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    function it_load_owners()
    {
        $this->get('/listOwners')
        ->assertStatus(200)
        ->assertViewIs('listOwners');
    }

    /** @test */
    function it_loads_creates_owners_page()
    {
        $this->get('/owners')
        ->assertStatus(200)
        ->assertViewIs('owners');
    }

    /** @test */
    function it_lodas_search_owner_page()
    {
        $this->get('/searchOwner')
        ->assertStatus(200)
        ->assertViewIs('searchOwner');
    }

    /** @test */
    function it_creates_a_new_owner()
    {
        $this->post('/createOwner', [
            'nombre' => 'Carlos Beltran',
            'identificacion' => '1234567897',
            'telefono' => '1234567895'
        ]);

        $this->assertDatabaseHas('owners',[
            'nombre' => 'Carlos Beltran',
            'identificacion' => '1234567897',
            'telefono' => '1234567895'
        ]);
    }
    
}
