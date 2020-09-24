<?php

namespace App\Http\Controllers;

use App\Models\MilitaryOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MilitaryOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        //$register =  MilitaryOrganization::where('ativo', '=', 'S')->get();
        //dd($register);               
        //return response()->ToBase64String($register);  
             
        $register = DB::connection('mypessoal')->table('opm')
        ->select('id', 'sigla', 'extenso', 'base', 'id_municipio')
        ->where('ativo', '=', 'S')->get();

/*       $response = array();
        
       foreach($register as $data){
           $response['id'] = $data->id;
           $response['sigla'] = $data->sigla;
           $response['sigla'] = $data->extenso;
       }  */
     
       return response()->json($register);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
