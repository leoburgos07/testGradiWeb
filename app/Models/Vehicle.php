<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'placa',
        'marca',
        'tipo',
    ];

    public function propietario(){
        return $this->belongsTo(Owner::class);
    }

}
