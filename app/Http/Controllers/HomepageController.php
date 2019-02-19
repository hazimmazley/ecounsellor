<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\University;
use App\Scholarship;
use App\Course;
use App\Post;
use DB;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $courses = DB::table('courses')
               ->take(3)
               ->get();
            //    $posts = \App\Post::where('category_id', 3)
            //    ->take(1)
            //    ->get();
            //    $universities = \App\University::where('course_duration', 3)
            //    ->take(3)
            //    ->get();
              // $universities = \App\University::all();
               $universities = DB::table('universities')->take(3)->get();
               $posts = DB::table('posts')->take(1)->get();
             
        return view('homepage',compact('courses','universities','posts'));
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
