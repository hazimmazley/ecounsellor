<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Redirect;
use Gate;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if (Gate::allows('isAdmin')||('isCoordinator')||('isSponsor')||('isTeacher')){
            

            $applies=\App\Apply::all();
            return view('apply.index',compact('applies'));
            }
    
            else{
                abort(404,"Sorry , this is for apply auth");
            }
       
  
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
        $applies=new \App\Apply;
        $applies->university=$request->get('university');
        $applies->course=$request->get('course');
        $applies->name=$request->get('name');
        $applies->contactno=$request->get('contactno');
        $applies->email=$request->get('email');
        //$category->description=$request->get('description');
        $applies->save();
        return Redirect::back()->withsuccess('Applied');
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
