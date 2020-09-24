<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Models\MilitaryOrganization;
use App\models\ServiceTeam;
use App\models\TeamFunction;
use Illuminate\Http\Request;

class ServiceTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register = ServiceTeam::where('st', '<>', 'C')->get();
        return view('lists.listServiceTeam', ['register' => $register]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamFunction = TeamFunction::where('st', '<>', 'C')->pluck('description_function', 'id')->prepend('Selecione...', '');
  
        $militaryOrganization = MilitaryOrganization::where('ativo', '=', 'S')->orderby('sigla')->pluck('sigla', 'id')->prepend('Selecione...', '');

        return view('forms.formServiceTeam', ['teamFunction'=>$teamFunction, 
                                              'militaryOrganization'=>$militaryOrganization]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = ServiceTeam::create($request->all());
       
        return redirect()->route('serviceteam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('forms.formServiceTeam', ['register' => ServiceTeam::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = ServiceTeam::findOrFail($id);
 
        $teamFunction = TeamFunction::where('st', '<>', 'C')->pluck('description_function', 'id')->prepend('Selecione a Função', '');

        $militaryOrganization = MilitaryOrganization::where('ativo', '=', 'S')->pluck('sigla', 'id')->prepend('Selecione a OPM', '');        

        $locality = Locality::where([['ativo', '=', 'S'],['id_opm', '=', $register->military_organization_id]])->pluck('sigla', 'id')->prepend('Selecione a Localidade', '');
    

        if ($register) {
            return view('forms.formServiceTeam', ['register'=>$register, 
                                                  'teamFunction'=>$teamFunction,
                                                  'militaryOrganization'=>$militaryOrganization,
                                                  'locality'=>$locality]);
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
        $registro = ServiceTeam::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('serviceteam.index');                   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = ServiceTeam::find($id);       
        $register->st = 'C';
        $register->update();

        return redirect()->route('serviceteam.index');  
    }
}
