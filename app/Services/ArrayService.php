<?php

namespace App\Services;

class ArrayService
{
    public function getArray()
    {
        return [
            ["2018-12-01","AM","ID123", 5000], 
            ["2018-12-01","AM","ID545", 7000], 
            ["2018-12-01","PM","ID545", 3000], 
            ["2018-12-02","AM","ID545", 7000]	
        ];
          
    }
}