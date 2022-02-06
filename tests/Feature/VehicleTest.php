<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{

    /** @test */
    function it_loads_create_vehicle_page()
    {
        $this->get('/vehicles')
        ->assertStatus(200)
        ->assertViewIs('vehicles');
    }

    /** @test */
    function it_loads_vehicles_page()
    {
        $this->get('/listVehicles')
        ->assertStatus(200)
        ->assertViewIs('listVehicles')
        ->assertSee('vehicles');
       
    }

    /** @test */
    function it_create_a_new_vehicle()
    {
        $this->post('/createVehicle',[
            'placa' => 'DDD 58f',
            'marca' => 'mazda',
            'tipo' => 'deportivo'
        ]);

        $this->assertDatabaseHas('vehicles',[
            'placa' => 'DDD58f',
            'marca' => 'Mazda',
            'tipo' => 'Deportivo'
        ]);
    }
}
