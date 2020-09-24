<?php

namespace App\Http\Controllers;

use App\models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register = VehicleType::where('st', '<>', 'C')->get();
        return view('lists.listVehicleType', ['register' => $register]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('forms.formVehicleType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = VehicleType::create($request->all());
       
        return redirect()->route('vehicletype.index');
                      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('forms.formVehicleType', ['register' => VehicleType::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = VehicleType::findOrFail($id);
 
        if ($register) {
            return view('forms.formVehicleType', ['register' => $register]);
        } else {
            return redirect()->back();
        }
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
        $registro = VehicleType::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('vehicletype.index');                   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = VehicleType::find($id);       
        $register->st = 'C';
        $register->update();

        return redirect()->route('vehicletype.index');  
    }
}
