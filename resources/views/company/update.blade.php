@extends('layouts.adminnew')

@section('content')
<h2>Update a Company</h2><br/>
<form method="post" action="{{action('CompanyController@update',$id)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Name">Company Name:</label>
            <input type="text" class="form-control" name="name" value="{{$companies->company_name}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Email">Description:</label>
            <input type="text" class="form-control" name="desc" value="{{$companies->description}}">
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
