@extends('layouts.adminnew')
<html>
<head>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> 
    
  
</head>

<body>
        @section('content')
            <h2>Create a Post</h2><br/>
            <form method="post" action="{{url('posts')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Title:</label>
                        <input type="text" class="form-control" name="name"  placeholder="e.g. 5 Study Tips" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label >Category: </label> <select name="category_id" required class="form-control">
                            @foreach($categories as $c) 
                            <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                             @endforeach </select>
                    </div>
                </div>
              <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                            <label for="Desc">Image 700 x 300:</label>
                        <input type="file" name="filename" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Desc">Body:</label>
                        <textarea class="form-control" name="desc" rows="10"></textarea>
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
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
            @endsection
        </body>
        </html>

