@extends('layouts.adminnew')

<body>
    @section('content')
        <h2>Create Study Level</h2><br/>
        <form method="post" action="{{url('programs')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Level Name:</label>
                    <input type="text" class="form-control" name="programname"  placeholder="e.g. Bachelor Degree" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Description:</label>
                    <input type="text" class="form-control" name="desc"  placeholder="e.g. Bachelor degree" required>
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
