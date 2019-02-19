

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">




<link rel="stylesheet" type="text/css" href="csstable/csstbl.css" />
<!------ Include the above in your HEAD tag ---------->


@extends('layouts.adminnew')

<body>


@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboards.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Apply</li>
      </ol>

      <div class="container">
          @include('flashmessages')
      </div>


     

<div class="panel-body">
    {{--<div class="row">
        <div class="col-sm-6">
            <div class="mb-md">
                    

                <a href="{{ route('categories.create')}}" class="btn btn-primary "> Add new categories <i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>--}}
    <br>


   <!-- DataTables Example -->
   <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Apply Data Table </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>University</th>
                <th>Course</th>
                <th>Contact No</th>
                <th>Email</th>
                
                
            </tr>
          </thead>
 
          <tbody>

                @foreach($applies as $apply)
            <tr>
                    <td>{{$apply['id']}}</td>
                    <td>{{$apply['name']}}</td>
                    <td>{{$apply['university']}}</td>
                    <td>{{$apply['course']}}</td>
                    <td>{{$apply['contactno']}}</td>
                    <td>{{$apply['email']}}</td>
                   {{-- <td class="actions">
                      
                       <a href="{{action('CategoryController@edit', $category['id'])}}" class="on-default edit-row"><i class="fas fa-edit" size:7x></i></a>
                    </td><td> <form class="delete"  action="{{action('CategoryController@destroy', $category['id'])}}" method="post">
                             
                                <input name="_method" type="hidden" value="DELETE">
                                @csrf
                            
                                <button type="submit" Onclick="return ConfirmDelete()"><i class="fas fa-trash-alt" size:7x ></i></button>
                              </form>
                       
                    </td>--}}
            </tr>
            @endforeach
  

     
    
   
    
      
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <script>
    function ConfirmDelete()
    {
      return confirm("Are you sure you want to delete?");
    }
    </script>
{{--<div class ="text-center">
    {!!$categories->links();!!}
</div>--}}
@endsection

</body>