<?php

namespace App\Http\Controllers;

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
        //$register = Vehicle::all();
        $register = DB::connection('myveiculo')->table('_14_03_viatura')
        ->join('_14_00_situacao_viatura', '_14_00_situacao_viatura.idsituacaoviatura', '=', '_14_03_viatura.id_situacao_viatura')
        ->join('_14_00_situacao', '_14_00_situacao.idsituacao', '=', '_14_00_situacao_viatura.idsituacao')
        ->join('_14_00_tipo_veiculo', '_14_00_tipo_veiculo.idtipoveiculo', '=', '_14_03_viatura.idtipoveiculo')
        ->join('_14_00_modelo_veiculo', '_14_00_modelo_veiculo.idmodeloveiculo', '=', '_14_03_viatura.idmodeloveiculo')
        ->whereIn('_14_00_situacao.idsituacao', [1, 2, 3, 7])
        ->select('_14_03_viatura.idviatura', '_14_03_viatura.placa', '_14_03_viatura.prefixo', '_14_03_viatura.km_atual',
        '_14_00_tipo_veiculo.tipoveiculo', '_14_00_modelo_veiculo.nome as nome_modelo', '_14_00_situacao.descricao_situacao')
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
