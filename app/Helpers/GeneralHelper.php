<?php
namespace app\Helpers;


use App\Models\Owner;
use Illuminate\Support\Facades\DB;


class GeneralHelper{

   public static function validateIdentification($identification){
       $owners = Owner::all();

       foreach($owners as $owner){
           if($identification == $owner['identificacion']){
               return true;
           }
       }
       return false;
       
   }
}