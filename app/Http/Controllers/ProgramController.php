<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isCoordinator')){
        $programs=\App\Program::all()->sortBy('program_name');
        return view('program.index',compact('programs'));
        }
        else{
            abort(403,"Sorry , this is for category auth");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('isCoordinator')){
        $programs=\App\Program::all();
        return view ('program.create');
        }
        else{
            abort(403,"Sorry , this is for category auth");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programs=new \App\Program;
        $programs->program_name=$request->get('programname');
        $programs->description=$request->get('desc');
        $programs->save();
       // $brands->save();

        return redirect('programs')->withsuccess('A Study Level has been added');
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
        if (Gate::allows('isCoordinator')){
        $programs =\App\Program::find($id);
        return view ('program.update',compact('programs','id'));
        }
        else{
            abort(403,"Sorry , this is for category auth");
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
        $programs=\App\Program::find($id);
        $programs->program_name=$request->get('programname');
        $programs->description=$request->get('desc');
        $programs->save();
       // $brands->save();

        return redirect('programs')->withsuccess('A study Level has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programs=\App\Program::find($id);
        $programs->delete();
        return redirect ('programs')->withdanger('A Study Level has been deleted');
    }
}
