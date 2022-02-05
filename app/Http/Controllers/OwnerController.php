<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::All();

        return view('listOwners', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createOwner(Request $request)
    {
        if (GeneralHelper::validateIdentification($request['cc'])) {
            return Redirect::back()->withErrors(['msg' => 'La identificacion ' . $request["cc"] . ' ya esta registrada']);
        }
        Owner::create([
            'nombre' => $request['nombre'],
            'identificacion' => $request['cc'],
            'telefono' => $request['telefono']
        ]);

        return redirect('/owners')->with('success', 'Propietario creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::find($id);
        return view('editOwner', compact('owner'));
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
        $owner = Owner::find($id);
        if (GeneralHelper::validateIdentification($request['cc'])) {
            return Redirect::back()->withErrors(['msg' => 'La identificacion ' . $request["cc"] . ' ya esta registrada']);
        }

        $owner->nombre = $request->nombre;
        $owner->identificacion = $request->cc;
        $owner->telefono = $request->telefono;
        $owner->save();
        return redirect('/listOwners')->with('success', 'Propietario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (GeneralHelper::validateOwner($id)) {
            return redirect()->back()->withErrors(['msg' => 'No se puede eliminar el propietario porque tiene vehículos asociados']);
        }

        $owner = Owner::findOrFail($id);
        $owner->delete();
        return redirect('/listOwners')->with('success', 'Propietario eliminado correctamente');
    }
    /**
     * 
     */
    public function search(Request $request)
    {
        $owners = Owner::all();
        $results = [];
        $resultsVehicles = [];
        


        foreach ($owners as $owner) 
        {
            if (strpos(strtolower($owner['nombre']), strtolower($request->nombre)) === false) {
            } else {
                $vehicles = DB::table('vehicles')
                ->join('owners', 'owners.id', 'vehicles.owner_id')
                ->select('vehicles.id', 'vehicles.placa as placa', 'vehicles.marca as marca', 'vehicles.tipo as tipo', 'owners.nombre as propietario')
                ->where('vehicles.owner_id',$owner['id'])
                ->get();
                array_push($results, $owner);
                array_push($resultsVehicles, $vehicles);
            }
            
        }
       
        return view('results',compact([
            'results',
            'resultsVehicles'
        ]));
    }
    public function searchOwner()
    {
        return view('searchOwner');
    }

    /**
     * 
     */
    public function searchByIdentification(Request $request)
    {
        $owners = Owner::all();
        $results = [];
        $resultsVehicles = [];
        

        foreach($owners as $owner)
        {
             if($owner['identificacion'] === $request->identificacion)
             {
                $vehicles = DB::table('vehicles')
                ->join('owners', 'owners.id', 'vehicles.owner_id')
                ->select('vehicles.id', 'vehicles.placa as placa', 'vehicles.marca as marca', 'vehicles.tipo as tipo', 'owners.nombre as propietario')
                ->where('vehicles.owner_id',$owner['id'])
                ->get();
                array_push($results, $owner);
                array_push($resultsVehicles, $vehicles);
             }
             
        }
        
        return view('results',compact([
            'results',
            'resultsVehicles'
        ]));
    }
}
