<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (Gate::allows('isSponsor')||('isAdmin')||('isTeacher')||('isCoordinator')){ 
        $companies=\App\Company::all();
        return view('company.index',compact('companies'));
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
        if (Gate::allows('isSponsor')){ 
        $companies=\App\Company::all();
        return view ('company.create');
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
        $companies=new \App\Company;
        $companies->company_name=$request->get('name');
        $companies->description=$request->get('desc');
        //$category->description=$request->get('description');
        $companies->save();
        return redirect('companies')->withsuccess('A Company has been added');
    
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
        if (Gate::allows('isSponsor')){ 
        $companies =\App\Company::find($id);
        return view ('company.update',compact('companies','id'));
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
        $companies=\App\Company::find($id);
        $companies->company_name=$request->get('name');
        $companies->description=$request->get('desc');
        //$brand->description=$request->get('description');
        $companies->save();
        return redirect('companies')->withsuccess('A Company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies=\App\Company::find($id);
        $companies->delete();
        return redirect ('companies')->withdanger('A Company has been deleted');
    }
}
