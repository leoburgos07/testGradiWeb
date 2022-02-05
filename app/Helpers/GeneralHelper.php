<?php

namespace App\Helpers;


use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;


class GeneralHelper
{

    public static function validateIdentification($identification)
    {
        $owners = Owner::all();

        foreach ($owners as $owner) {
            if ($identification == $owner['identificacion']) {
                return true;
            }
        }
        return false;
    }
    
    public static function validateOwner($id)
    {
        $vehicles = Vehicle::all();
        foreach($vehicles as $vehicle){
            if($id == $vehicle['owner_id']){
                return true;
            }
        }
        return false;
    }
    
    public static function validatePlate($placa)
    {
        $vehicles = Vehicle::All();
        foreach($vehicles as $vehicle){
            if($placa == $vehicle['placa']){
                return true;
            }
        }
        return false;
    }

   
}
