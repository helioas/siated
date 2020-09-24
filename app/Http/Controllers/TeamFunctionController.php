<?php

namespace App\Http\Controllers;

use App\models\TeamFunction;
use Illuminate\Http\Request;

class TeamFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register = TeamFunction::where('st', '<>', 'C')->get();
        return view('lists.listTeamFunction', ['register' => $register]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.formTeamFunction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = TeamFunction::create($request->all());
       
        return redirect()->route('teamfunction.index');                      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('forms.formTeamFunction', ['register' => TeamFunction::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = TeamFunction::findOrFail($id);
 
        if ($register) {
            return view('forms.formTeamFunction', ['register' => $register]);
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
        $registro = TeamFunction::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('teamfunction.index');                   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = TeamFunction::find($id);       
        $register->st = 'C';
        $register->update();

        return redirect()->route('teamfunction.index');  
    }
}
