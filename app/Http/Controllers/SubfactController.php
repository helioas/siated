<?php

namespace App\Http\Controllers;

use App\Models\Subfact;
use App\Models\Fact;

use Illuminate\Http\Request;

class SubfactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register = Subfact::where('subfacts.st', '<>', 'C')->get();   

        return view('lists.listSubfact', ['register' => $register]);
    }   

    /** 
     * Show the form for creating a new resource.   
     *  
     * @return \Illuminate\Http\Response    
     */ 
    public function create()    
    {   
        $fact = Fact::where('st', '<>', 'C')->pluck('fact_description', 'id')->prepend('Selecione o Fato', '');
        
        return view('forms.formSubfact')->with('fact', $fact);  
    }   

    /** 
     * Store a newly created resource in storage.   
     *  
     * @param  \Illuminate\Http\Request  $request   
     * @return \Illuminate\Http\Response    
     */ 
    public function store(Request $request)
    {
        $register = Subfact::create($request->all());
       
        if($register) {
            return redirect()->route('subfact.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('forms.formSubfact', ['register' => SubFact::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = Subfact::findOrFail($id);

        $fact = Fact::where('st', '<>', 'C')->pluck('fact_description', 'id')->prepend('Selecione o Fato', '');
        
        if ($register) {
            return view('forms.formSubfact', ['register' => $register])->with('fact', $fact);
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
        $registro = Subfact::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('subfact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = Subfact::find($id);
        $register->st = 'C';
        $register->update();

        return redirect()->route('subfact.index');  
    }
}
