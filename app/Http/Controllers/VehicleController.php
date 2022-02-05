<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vehicles = Vehicle::all();
        $vehicles = DB::table('vehicles')
            ->join('owners', 'owners.id', 'vehicles.owner_id')
            ->select('vehicles.id', 'vehicles.placa as placa', 'vehicles.marca as marca', 'vehicles.tipo as tipo', 'owners.nombre as propietario')
            ->get();

        $marcas = DB::table('vehicles')
            ->select(DB::raw('count(marca) as cantidad, marca'))
            ->groupBy('marca')
            ->get();



        return view('listVehicles', compact([
            'vehicles',
            'marcas'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();
        return view('vehicles', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVehicle(Request $request)
    {
        if (GeneralHelper::validatePlate($request->placa)) {
            return redirect()->back()->withErrors(['msg' => 'La placa ' . $request->placa . ' ya existe en el sistema ']);
        }

        Vehicle::create([
            "placa" => str_replace(' ','',strtoupper($request->placa)),
            "marca" => ucfirst($request->marca),
            "tipo" => ucfirst($request->tipo),
            "owner_id" => $request->select
        ]);

        return redirect('/vehicles')->with('success', 'Vehículo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchVehicle(Request $request)
    {
        $vehicles = Vehicle::All();
        foreach ($vehicles as $vehicle) {
            if ($vehicle['placa'] === $request->placa) 
            {
                $result = DB::table('vehicles')
                    ->join('owners', 'owners.id', 'vehicles.owner_id')
                    ->select('vehicles.id', 'vehicles.placa as placa', 'vehicles.marca as marca', 'vehicles.tipo as tipo', 'owners.nombre as propietario')
                    ->where('vehicles.placa',$request->placa)
                    ->get();

                  

                return view('/resultsVehicle', compact('result'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->delete();
        return redirect('/listVehicles')->with('success', 'Vehículo eliminado correctamente');
    }
}
