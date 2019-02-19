<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use Auth;
use Gate;
use App\University;


class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities=\App\University::paginate(6);
        return view('university.index',compact('universities'));
       
    }

    public function manage()
    {
        if (Gate::allows('isCoordinator')||('isAdmin')||('isTeacher')||('isSponsor')){
        $universities=\App\University::all();
        return view('university.manage',compact('universities'));
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
        //$states = State::orderBy('state_name')->get();
        $universities=\App\University::all();
        return view ('university.create', compact('states','universities'));
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
        if ($request->hasfile('filename'))
        {
            $file =$request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);

        }

        $universities=new \App\University;
        $universities->university_name=$request->get('name');
        $universities->description=$request->get('desc');
        $universities->address=$request->get('address');
        $universities->phoneno=$request->get('phoneno');
        $universities->state=$request->get('state');
        //$universities->state_id=$request->get('state_id');
        $universities->university_img=$name;
        $user_id = Auth::user()->id;
        $universities->users()->associate($user_id);
        $universities->save();
    
        
        return redirect('universitiesmanage')->withsuccess('A University has been added');
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

        $universities=\App\University::find($id);
        return view('university.show',compact('universities','id'));
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
        //$states = State::get();
        $universities=\App\University::find($id);
        return view('university.update',compact('universities','id'));
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
        
     
        $universities= \App\University::findOrFail($id);  

          //add new photo
          if ($request->hasfile('filename'))
        {
            $file =$request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);

            $oldFilename= $universities->university_img;

             //update file
             $universities->university_img=$name;
             
             //delete file
            Storage::delete($oldFilename);

        }

      
       
        $universities->university_name=$request->get('name');
        $universities->description=$request->get('desc');
        $universities->address=$request->get('address');
        $universities->phoneno=$request->get('phoneno');
        $universities->state=$request->get('state');
        //$universities->state_id=$request->get('state_id');
        //$universities->university_img=$name;
        $universities->save();
        
        return redirect('universitiesmanage')->withsuccess('A University has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universities=\App\University::find($id);
        $name = $universities->university_name;
       // $universities->states()->dissociate(); // drop all existing relationship 
        $universities->delete(); 
        return redirect('universitiesmanage')->withdanger('A University '.$name.' has been deleted');
    }


  
    function fetch(Request $request)
    {


     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('universities')
        ->where('university_name', 'LIKE', "%{$query}%")
        ->take(8)
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; margin-left: 1px; width: 243px; border: 2px solid rgb(153, 153, 153); position:absolute">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->university_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }




    public function search(Request $request)
{
    $search = \Request::get('country_name'); 
    $universities =\App\ University::where('university_name','like','%'.$search.'%')->paginate(1);

   return view('university.index', compact('universities'));
}


public function filter(Request $request)
{
  
  
  $universities = new University;
  $state = $request->state;

  if($state != "alllocations"){
    $universities = $universities->where('state' ,request('state'))  
    ->paginate(6)
    ->appends('state',request('state'));
}

else 
{

    return redirect('universities');
    
}

//   if (request()->has('state')) {
//     $universities = $universities->where('state' ,request('state'))
//     ->paginate(4)
//     ->appends('state',request('state'));
//   } 
  


  // $courses= $courses->paginate(5)->appends(
  //     [
  //         'program_id'=> request('program_id')
  //     ]
  //     );
  return view('university.index',compact('universities'));
  
}


}
