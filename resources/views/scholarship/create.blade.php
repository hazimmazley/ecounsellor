@extends('layouts.adminnew')


<html>
<head>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


</head>
<body>
        @section('content')
            <h2>Create a Scholarship</h2><br/>
            <form method="post" action="{{url('scholarships')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4"></div>

                    <div class="form-group col-md-4">
                        <label for="Name">Scholarship Name:</label>
                        <input type="text" class="form-control" name="name"  placeholder="e.g. Yayasan Tenaga Nasional" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label >Company : </label> <select name="company_id" required class="form-control">
                            @foreach($companies as $c) 
                            <option value="{{ $c->id }}">{{ $c->company_name }}</option>
                             @endforeach </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Date">Closing Date:</label>
                        <input type='text' name="date" id="datepicker"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="img">Picture Size 700 x 400:</label>
                        <input type="file" name="filename" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Detail">Detail:</label>
                        <textarea class="form-control" type="text"  name="detail"  rows="10" ></textarea>
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

            <script type="text/javascript">
            
               
                    $('#datepicker').datepicker({
                        format: "yyyy/mm/dd"
                    });
          
            </script>
        </body>
        </html>

@endsection
