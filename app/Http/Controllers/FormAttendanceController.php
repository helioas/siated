<?php

namespace App\Http\Controllers;

use App\Models\FormAttendance;
use Illuminate\Http\Request;

class FormAttendanceController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FormAttendance = FormAttendance::where('st', '<>', 'C')->get();
        return view('lists.listFormAttendance', ['register' => $FormAttendance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.formFormAttendance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $register = FormAttendance::create($request->all());
       
        if($register) {
            return redirect()->route('formattendance.index');
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
        return view('forms.formFormAttendance', ['register' => FormAttendance::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = FormAttendance::findOrFail($id);
 
        if ($register) {
            return view('forms.formFormAttendance', ['register' => $register]);
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
        $register = FormAttendance::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('formattendance.index');                   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = FormAttendance::find($id);
        $register->st = 'C';
        $register->update();

        return redirect()->route('formattendance.index');  
    }
}
