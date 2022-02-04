<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Owner::create([
            'nombre' => "Carlos Beltran",
            "identificacion" => "10830456456",
            "telefono" => "3154578934"
        ]);
        Owner::create([
            'nombre' => "Daniel Rodriguez",
            "identificacion" => "364885129",
            "telefono" => "315426789"
        ]);
    }
}
