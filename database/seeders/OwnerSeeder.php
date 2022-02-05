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
            "identificacion" => "1234567897",
            "telefono" => "1234567895"
        ]);
        Owner::create([
            'nombre' => "Daniel Rodriguez",
            "identificacion" => "1234567899",
            "telefono" => "1234567892"
        ]);
    }
}
