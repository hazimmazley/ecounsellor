<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University, App\Program, App\Course, App\Scholarship, App\Category, App\Post, App\Company,App\User, App\Apply;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // $users=\App\User::all();
        if (Gate::allows('isAdmin')||Gate::allows('isTeacher')||Gate::allows('isSponsor')||Gate::allows('isCoordinator')){

        $userCount = User::count();
        $universityCount = University::count();
        $programCount = Program::count();
        $courseCount = Course::count();
        $scholarshipCount = Scholarship::count();
        $categoryCount = Category::count();
        $postCount = Post::count();
        $companyCount = Company::count();
        $applyCount = Apply::count();
        
       
       
        
        return view('dashboard',compact('universityCount', 'programCount', 'courseCount','scholarshipCount','categoryCount','postCount','companyCount','programCount','userCount','applyCount'));
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
