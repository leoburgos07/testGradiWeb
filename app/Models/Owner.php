<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'identificacion',
        'telefono'
    ];

    public function vehiculo(){
        return $this->hasMany(Vehicle::class);
    }
}
