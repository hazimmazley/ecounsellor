@extends('layouts.adminnew')



<html>



<body>
        @section('content')
            <h2>Create a Company</h2><br/>
            <form method="post" action="{{url('companies')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Company Name:</label>
                        <input type="text" class="form-control" name="name"  placeholder="e.g. Tenaga Nasional Berhad" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Description:</label>
                        <input type="text" class="form-control" name="desc"  placeholder="e.g. " required>
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
