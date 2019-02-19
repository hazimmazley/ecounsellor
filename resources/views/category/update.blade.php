@extends('layouts.adminnew')



<body>
    @section('content')
        <h2>Update a Category</h2><br/>
        <form method="post" action="{{action('CategoryController@update',$id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Category Name:</label>
                    <input type="text" class="form-control" name="name"  value="{{$categories->category_name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Email">Description:</label>
                    <input type="text" class="form-control" name="desc" value="{{$categories->description}}">
                </div>
            </div>
            
         {{--  <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <input type="file" name="filename">
                </div>
                
            </div>
           --}}
      
   
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
  
    </body>
    </html>

@endsection 
