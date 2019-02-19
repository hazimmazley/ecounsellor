@extends('layouts.adminnew')

<html>
<head>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

    <body>
        @section('content')
            <h2>Update A  University</h2><br/>
            <form method="post" action="{{action('UniversityController@update', $id)}}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">University Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$universities->university_name}}">
                    </div>
                </div>
              

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Address:</label>
                        <input type="text" class="form-control" name="address" value="{{$universities->address}}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Phone No:</label>
                        <input type="text" class="form-control" name="phoneno" value="{{$universities->phoneno}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label >State: {{$universities->state}}</label> 
                        <select class="custom-select"  name="state" id="inputGroupSelect01" required>
                            <option selected>Choose State</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri Sembilan ">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                           <option value="Selangor">Selangor</option>
                           <option value="Terengganu">Terengganu</option>
                          </select>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="img">Picture Size 700 x 400:</label>
                        <input type="file" name="filename" value="{{$universities->university_img}}"  required><br><br>Current Image<br>
                        <img class="card-img-top" src="{{ asset('images/'.$universities->university_img) }}"alt=""   style="width:120px;height:80px;">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Description:</label>
                        <textarea class="form-control" name="desc" rows="10" value="{!!$universities->description!!}" ></textarea>
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
