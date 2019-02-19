<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Program;
use App\University;
use App\Scholarship;
use App\Course;
use Auth;
use DB;
use Gate;
Use Redirect;
use Illuminate\Support\Facades\Input;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=\App\Course::paginate(8);
        return view('course.index',compact('courses'));
    }

    public function manage()
    {
        if (Gate::allows('isCoordinator')||('isAdmin')||('isTeacher')||('isSponsor')){ 
        $courses=\App\Course::all();
        return view('course.manage',compact('courses'));
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
        $universities = University::orderBy('university_name')->get();
        $programs = Program::orderBy('program_name')->get();
        $scholarships = Scholarship::orderBy('scholarship_name')->get();
        $courses=\App\Course::all();
        return view ('course.create', compact('programs','universities','courses','scholarships'));
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
        $courses=new \App\Course;
       
        $courses->course_name=$request->get('name');
        $courses->course_duration=$request->get('duration');
        $courses->course_fee=$request->get('fee');
        $courses->intake=$request->get('intake');
        $courses->requirement=$request->get('requirement');
        $courses->field=$request->get('field');
        $courses->university_id=$request->get('university_id');
        $courses->program_id=$request->get('program_id');
        $user_id = Auth::user()->id;
        $courses->users()->associate($user_id);
        $courses->save();
        
        return redirect('coursesmanage')->withsuccess('A Course has been added');


           //$schs = $request->input('scholarship_id');
       // foreach ($schs as $s) 
        //{ $scholarships = Scholarship::find([$s]);
          //   $courses->scholarships()->attach($scholarships); }
        
      
        //$cats = $request->input('category_id');
       // foreach($cats as $c) 
        //{ $categories = Category::find([$c]); 
          //  $posts->categories()->attach($categories);
       // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses=\App\Course::find($id);
        return view('course.show',compact('courses','id'));
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
        $universities = University::get();
        $programs = Program::get();
        $scholarships = Scholarship::get();
        $courses=\App\Course::find($id);
        return view('course.update',compact('universities','programs','id','scholarships','courses'));
        }
        else {
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
        $courses= \App\Course::findOrFail($id);

        $courses->course_name=$request->get('name');
        $courses->course_duration=$request->get('duration');
        $courses->course_fee=$request->get('fee');
        $courses->intake=$request->get('intake');
        $courses->requirement=$request->get('requirement');
        $courses->field=$request->get('field');
        $courses->university_id=$request->get('university_id');
        $courses->program_id=$request->get('program_id');
        $courses->save();
       // $courses->scholarships()->detach();

        
        //$schs = $request->input('scholarship_id');
        //foreach ($schs as $s) 
        //{ $scholarships = Scholarship::find([$s]);
           //  $courses->scholarships()->attach($scholarships); }
        

        return redirect('coursesmanage')->withsuccess('A Course has been updated');
  




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $courses= \App\Course::findOrFail($id);
        $courses->universities()->dissociate();
        $courses->programs()->dissociate();
        //$courses->scholarships()->detach(); // drop all existing relationship 
        $courses->delete(); 
        return redirect('coursesmanage')->withdanger('A Course has been deleted');


    }


    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('courses')
        ->where('course_name', 'LIKE', "%{$query}%")
        ->take(8)
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block;  margin-left: 1px; width: 242px; border: 2px solid rgb(153, 153, 153); position:absolute">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->course_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }



    public function search(Request $request)
    {
        $search = \Request::get('searchcourse'); 
        $courses =\App\ Course::where('course_name','like','%'.$search.'%')->paginate(1);
        $universities = University::orderBy('university_name')->get();
        $programs = Program::orderBy('program_name')->get();
        $scholarships = Scholarship::orderBy('scholarship_name')->get();
    
       return view('course.index',compact('programs','universities','courses','scholarships'));
    }

  public function filter(Request $request)
  {
    //precious code
                $courses=new Course;


                $program_id = $request->program_id;
                $field = $request->field;

                if($program_id !="" && $field !=""){
                
                    
                   // echo "both are selected";
                   $courses = $courses
                        ->where('program_id',request('program_id'))
                        ->where('field',request('field'))
                    ->paginate(5)->appends('program_id','field',request('program_id','field'));
                }

                else if($program_id!=""){
                    
                    //echo "program is selected";
                    $courses = $courses->where('program_id' ,request('program_id'))
                    ->paginate(5)->appends('program_id',request('program_id'));
                }


                else if($field!=""){
                  //  echo "field is selected";
                  $courses = $courses->where('field' ,request('field'))->paginate(5)->appends('field',request('field'));
                }


                else{
                    return Redirect::back()->withsuccess('No Select option');
                }
  

               return view('course.index',compact('courses'));




// if (request()->has('program_id','field')) {
//        $courses = $courses
//         ->where('program_id' ,request('program_id'))
//         ->where('field',request('field'));
//        //->paginate(5)->appends('program_id','field',request('program_id','field'));
//       }

//         $courses =$courses->paginate(5)->appends([
//             'program_id' => request('program_id'),
//             'field' => request('field')

//         ]);
//   $courses = Course::where(function($q) {
//     $q->where('program_id' ,request('program_id'))
//       ->orWhere('field' ,request('field'))
//       ;})->paginate(1)->appends('program_id',request('program_id'))->appends('field',request('field'));


//       if ( $courses->isEmpty() ) {
//         return response(['error' => 'Record not found'], 404);
//       }

      


    


// if (request()->has('program_id','field')) {
    //    $courses = $courses
    //     ->where('program_id' ,request('program_id'))
    //     ->where('field',request('field'));
    //    //->paginate(5)->appends('program_id','field',request('program_id','field'));
    //   }

    //     $courses =$courses->paginate(5)->appends([
    //         'program_id' => request('program_id'),
    //         'field' => request('field')

    //     ]);

  

  



   


    // if (request()->has('program_id')) {
    //   $courses = $courses
    //   ->where('program_id' ,request('program_id'))->paginate(5)->appends('program_id',request('program_id'));
    // }

    // if (request()->has('field')) {
    //     $courses = $courses
    //     ->where('field' ,request('field'))->paginate(5)->appends('field',request('field'));
    //   }

    // if (request()->has('program_id','field')) {
    //    $courses = $courses
    //     ->where('program_id' ,request('program_id'))
    //     ->where('field',request('field'));
    //    //->paginate(5)->appends('program_id','field',request('program_id','field'));
    //   }

    //     $courses =$courses->paginate(5)->appends([
    //         'program_id' => request('program_id'),
    //         'field' => request('field')

    //     ]);
      

    
    
  }





}
