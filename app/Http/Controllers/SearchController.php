<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\University;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        
        $search = \Request::get('search'); 
        $universities = University::where('university_name','like','%'.$search.'%')->paginate(1);
      
        return view('university.index', compact('universities'));
       
    }
}
