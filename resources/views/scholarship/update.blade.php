@extends('layouts.adminnew')


<head>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
        @section('content')
            <h2>Update a Scholarship</h2><br/>
            <form method="post" action="{{action('ScholarshipController@update',$id)}}"  enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Scholarship Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$scholarships->scholarship_name}}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label >Company : {{$scholarships->companies->company_name}}</label> <select name="company_id" class="form-control">
                            @foreach($companies as $c) 
                            <option value="{{ $c->id }}" required>{{ $c->company_name }}</option>
                             @endforeach </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Date">Closing Date:</label>
                        <input type='text' name="date" id="datepicker" value="{{$scholarships->date}}" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="img">Picture Size 700 x 400:</label>
                        <input type="file" name="filename"   value="{{$scholarships->scholarship_img}}" required><br><br>Current Image<br>
                        <img class="card-img-top" src="{{ asset('images/'.$scholarships->scholarship_img) }}"alt=""   style="width:120px;height:80px;">
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="Date">Detail:</label>
                
                            <textarea class="form-control" type="text"  name="detail"   rows="10" value="{!!$scholarships->detail!!}" ></textarea>
                        </div>
                    </div>
    
                 
    
                                
                    
                


              
                    <script type="text/javascript">
    
                     $('#datepicker').datepicker({
                        format: "yyyy/mm/dd"
                    });
                    
                    </script>  
                    
                
                
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
