<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use Redirect;
use Gate;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin')||('isCoordinator')||('isSponsor')||('isTeacher')){
            

            $contacts=\App\Contact::all();
            return view('contact.index',compact('contacts'));
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
        $contacts=new \App\Contact;
        $contacts->name=$request->get('name');
        $contacts->phoneno=$request->get('phoneno');
        $contacts->email=$request->get('email');
        $contacts->message=$request->get('message');
       
        //$category->description=$request->get('description');
        $contacts->save();
        return Redirect::back()->withsuccess('Success');
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
