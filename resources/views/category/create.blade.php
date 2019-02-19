@extends('layouts.adminnew')



<body>
        @section('content')
            <h2>Create a Category</h2><br/>
            <form method="post" action="{{url('categories')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Category Name:</label>
                        <input type="text" class="form-control" name="name"  placeholder="e.g. Study Tips" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Description:</label>
                        <input type="text" class="form-control" name="desc"  placeholder="e.g. This is study tip" required>
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


