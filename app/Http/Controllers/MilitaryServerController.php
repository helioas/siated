<?php

namespace App\Http\Controllers;

use App\Models\MilitaryServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MilitaryServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$register = MilitaryServer::all();
        $register = DB::connection('mypessoal')->table('servidor')
        ->join('cargo', 'cargo.id', '=', 'servidor.id_cargo')
        ->whereIn('servidor.id_sit_vinculo', [1, 2])
        ->where('servidor.id_opm', '<>', 36)
        ->select('servidor.id', 'servidor.mat_univrh', 'servidor.nome', 'servidor.nome_guerra', 'cargo.sigla as cargo')    
        ->get();        

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
