<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::allows('isTeacher')||('isAdmin')||('isCoordinator')||('isSponsor')){
            

        $categories=\App\Category::all();
        return view('category.index',compact('categories'));
        }

        else{
            abort(403,"Sorry , this is for category auth");
        }

        
       
    }


    public function category()
    {
        
        $categories=\App\Category::all();
        return view('post.index', compact('categories'));
       
       
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Gate::allows('isTeacher')){

        $categories=\App\Category::all();
        return view ('category.create');
    }

    else
    {
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
        $categories=new \App\Category;
        $categories->category_name=$request->get('name');
        $categories->description=$request->get('desc');
        //$category->description=$request->get('description');
        $categories->save();
        return redirect('categories')->withsuccess('Category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = \App\Category::find($id);
        $posts=\App\Post::get();
        return view('category.show',compact('categories','posts','id'));
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
            
        $categories =\App\Category::find($id);
        return view ('category.update',compact('categories','id'));

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
        $categories=\App\Category::find($id);
        $categories->category_name=$request->get('name');
        $categories->description=$request->get('desc');
        //$brand->description=$request->get('description');
        $categories->save();
        return redirect('categories')->withsuccess('Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=\App\Category::find($id);
        $categories->delete();
        return redirect ('categories')->withdanger('Category has been deleted');
    }

    
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('categories')
        ->where('category_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->category_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }



}
