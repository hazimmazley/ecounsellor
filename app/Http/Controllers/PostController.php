<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Category;
use DB;
use Auth;
use Gate;
use Response;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $posts=\App\Post::orderBy('created_at','desc')->paginate(3);
        $categories = Category::orderBy('category_name')->get();
        return view('post.index', compact('posts','categories'));
      
        //$posts=\App\Post::with('categories')->get();
       // return view('post.index', compact('posts'));
       
    }

    public function manage()
    {
        if (Gate::allows('isTeacher')||('isAdmin')||('isCoordinator')||('isSponsor')){ 
        
        $posts=\App\Post::with('categories')->get();
        return view('post.manage', compact('posts'));
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
        if (Gate::allows('isTeacher')){ 
        $categories =Category::orderBy('category_name')->get(); // for dropdown menu 
        return view('post.create',compact('categories'));
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

        $posts=new \App\Post;
        
        $posts->post_name=$request->get('name');
        $posts->description=$request->get('desc');
        $posts->category_id=$request->get('category_id');
        $posts->post_img=$name;
        $user_id = Auth::user()->id;
        $posts->users()->associate($user_id);
        $posts->save();
        //$cats = $request->input('category_id');
       // foreach($cats as $c) 
        //{ $categories = Category::find([$c]); 
          //  $posts->categories()->attach($categories);
       // }
        
        return redirect('postsmanage')->withsuccess('A Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::get();
        $posts=\App\Post::find($id);
        return view('post.show',compact('categories','posts','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('isTeacher')){ 
        $categories = Category::get();
        $posts=\App\Post::find($id);
        return view('post.update',compact('categories','posts','id'));
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
        // if ($request->hasfile('filename'))
        // {
        //     $file =$request->file('filename');
        //     $name=time().$file->getClientOriginalName();
        //     $file->move(public_path().'/images/',$name);

        // }


        $posts= \App\Post::findOrFail($id);  
   

          //add new photo
          if ($request->hasfile('filename'))
        {
            $file =$request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);

            $oldFilename= $posts->post_img;

             //update file
             $posts->post_img=$name;
             
             //delete file
            Storage::delete($oldFilename);

        }

    
            $posts->post_name=$request->get('name');
            $posts->description=$request->get('desc');
            $posts->category_id=$request->get('category_id');
            //$posts->post_img=$name;
            $posts->save();
        //$cats = $request->input('category_id');
       // foreach($cats as $c) 
        //{ $categories = Category::find([$c]); 
          //  $posts->categories()->attach($categories);
       // }
        
        return redirect('postsmanage')->withsuccess('A Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=\App\Post::find($id);
        $name = $posts->post_name;
        $posts->categories()->dissociate(); // drop all existing relationship 
        $posts->delete(); 
        return redirect('postsmanage')->withdanger('A post name '.$name.' has been deleted');
    }


    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('posts')
        ->where('post_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; margin-left: 1px; width: 204px; border: 2px solid rgb(153, 153, 153); position:absolute">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->post_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }


    public function search(Request $request)
{
    $search = \Request::get('searchpost'); 
    $posts =\App\ Post::where('post_name','like','%'.$search.'%')->paginate(1);
    $categories = Category::orderBy('category_name')->get();

   return view('post.index', compact('posts','categories'));
}



}
