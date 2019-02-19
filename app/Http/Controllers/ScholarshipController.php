<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use Gate;
use App\Company;
use App\Scholarship;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isSponsor')||('isAdmin')||('isTeacher')||('isCoordinator')){ 
      
        $scholarships=\App\Scholarship::with('companies')->get();
        return view('scholarship.index',compact('scholarships'));
        }
        else{
            abort(403,"Sorry , this is for category auth");
        }
    }

    public function display()
    {
      
        $scholarships=\App\Scholarship::paginate(6);
        $courses = \App\Course::orderBy('course_name')->get();
        return view('scholarship.display',compact('scholarships','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('isSponsor')){ 
        $companies = Company::orderBy('company_name')->get();
        $scholarships=\App\Scholarship::all();
        return view ('scholarship.create', compact('companies','scholarships'));}
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

        if ($request->hasfile('filename'))
        {
            $file =$request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);

        }
        $scholarships=new \App\Scholarship;
       
        $scholarships->scholarship_name=$request->get('name');
        $scholarships->company_id=$request->get('company_id');
        $scholarships->detail=$request->get('detail');
        $scholarships->date=$request->get('date');
        $scholarships->scholarship_img=$name;
    
        $scholarships->save();
        return redirect('scholarships')->withsuccess('A Scholarship has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scholarships=\App\Scholarship::find($id);
        return view('scholarship.show',compact('scholarships','id'));
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
        $companies = Company::get();
        $scholarships=\App\Scholarship::find($id);
        return view('scholarship.update',compact('companies','scholarships','id'));
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


        $scholarships = \App\Scholarship::findOrFail($id); 
       // $universities= \App\University::findOrFail($id);  
                //add new photo
        
                if ($request->hasfile('filename'))
                {
                    $file =$request->file('filename');
                    $name=time().$file->getClientOriginalName();
                    $file->move(public_path().'/images/',$name);
        
                    $oldFilename= $scholarships->scholarship_img;
        
                    //update file
                    $scholarships->scholarship_img=$name;
                    
                    //delete file
                    Storage::delete($oldFilename);
        
                }


        $scholarships->scholarship_name=$request->get('name');
        $scholarships->company_id=$request->get('company_id');
        $scholarships->detail=$request->get('detail');
        $scholarships->date=$request->get('date');
        $scholarships->save();
        return redirect('scholarships')->withsuccess('A Scholarship has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scholarships=\App\Scholarship::find($id);
        //$name = $posts->post_name;
        $scholarships->companies()->dissociate(); // drop all existing relationship 
        $scholarships->delete(); 
        return redirect('scholarships')->withdanger('A Scholarship has been deleted');
    }


    public function search(Request $request)
    {
        $search = \Request::get('searchscholarship'); 
        $scholarships =\App\ Scholarship::where('scholarship_name','like','%'.$search.'%')->paginate(1);
    
       return view('scholarship.display', compact('scholarships'));
    }


    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('scholarships')
        ->where('scholarship_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; margin-left: 1px; width: 243px; border: 2px solid rgb(153, 153, 153); position:absolute">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->scholarship_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }


    public function filter(Request $request)
{
  
  
  $scholarships = new Scholarship;

  $company = $request->company;

  if($company != "all"){
         
    $scholarships  = $scholarships ->where('company_id' ,request('company'))->paginate(100)->appends('company_id',request('company'));
        }
else 
{

    return redirect('scholarshiplists');
    // echo"all companies";
    // return "<h1 align='center'>Please select atleast one filter from dropdown</h1>";
}

//   if (request()->has('company')) {
//     $scholarships = $scholarships->where('company_id' ,request('company'))->paginate(2)->appends('company_id',request('company'));
//   } 
  
//   else{
//       echo "no";
//   }
  


  // $courses= $courses->paginate(5)->appends(
  //     [
  //         'program_id'=> request('program_id')
  //     ]
  //     );
  return view('scholarship.display',compact('scholarships'));
  
}

}
