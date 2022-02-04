<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            "placa" => "DDD 58f",
            "marca" => ucfirst('mazda'),
            "tipo" => "Deportivo",
            "owner_id" => 1
        ]);
        Vehicle::create([
            "placa" => "DFR 237",
            "marca" => ucfirst('toyota'),
            "tipo" => "Deportivo",
            "owner_id" => 1
        ]);
        Vehicle::create([
            "placa" => "DSF 583",
            "marca" => ucfirst('toyota'),
            "tipo" => "Camioneta",
            "owner_id" => 2
        ]);
    }
}
