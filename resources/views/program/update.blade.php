@extends('layouts.adminnew')

<body>
        @section('content')
            <h2>Update a Program</h2><br/>
            <form method="post" action="{{action('ProgramController@update',$id)}}">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Program Name:</label>
                        <input type="text" class="form-control" name="programname"  value="{{$programs->program_name}}">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Description:</label>
                        <input type="text" class="form-control" name="desc"  value="{{$programs->description}}">
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
    