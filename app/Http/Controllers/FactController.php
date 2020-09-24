<?php

namespace App\Http\Controllers;

use App\Models\Fact;

use Illuminate\Http\Request;

class FactController extends Controller
{



    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register = Fact::where('st', '<>', 'C')->get();
        return view('lists.listFact', ['register' => $register]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.formFact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = Fact::create($request->all());
       
        //if($register) {
            return redirect()->route('fact.index');
       // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('forms.formFact', ['register' => Fact::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = Fact::findOrFail($id);
 
        if ($register) {
            return view('forms.formFact', ['register' => $register]);
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
        $registro = Fact::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('fact.index');                   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = Fact::find($id);
        $register->st = 'C';
        $register->update();

        return redirect()->route('fact.index');  
    }
}
