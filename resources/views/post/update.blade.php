@extends('layouts.adminnew')
<html>

<head>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script> 
</head>

<body>
    @section('content')
        <h2>Update A Post</h2><br/>
        <form method="post" action="{{action('PostController@update', $id)}}" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Title:</label>
                    <input type="text" class="form-control" name="name" value="{{$posts->post_name}}">
                </div>
            </div>
            <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label >Category: {{$posts->categories->category_name}} </label> 
                            
                            <select name="category_id" class="form-control">
                            @foreach($categories as $c) 
                            <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                             @endforeach </select>
                    </div>
                </div>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <input type="file" name="filename" value="{{$posts->post_img}}"><br><br>Current Image<br>
                    <img class="card-img-top" src="{{ asset('images/'.$posts->post_img) }}"alt=""   style="width:120px;height:80px;">
                </div>
            </div><br>
       
            <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Body">Body:</label>
            
                        <textarea class="form-control" type="text"  name="desc"  rows="10" value="{!!$posts->description!!}"   ></textarea>
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
  
    </body>
    </html>

@endsection