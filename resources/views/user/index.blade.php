

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
        <li class="breadcrumb-item active">Users</li>
      </ol>

      <div class="container">
          @include('flashmessages')
      </div>


     

<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-md">
                    

              @can('isAdmin') <a href="{{ route('users.create')}}" class="btn btn-primary "> Add new User <i class="fa fa-plus"></i></a>@endcan
            </div>
        </div>
    </div>
    <br>


   <!-- DataTables Example -->
   <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      User Data Table </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
                @can('isAdmin') <th>Edit</th>@endcan
                @can('isAdmin') <th>Delete</th>@endcan
                
            </tr>
          </thead>
 
          <tbody>

                @foreach($users as $user)
                {{--@if($user->usertype==admin)--}}
            <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['usertype']}}</td>
                    @can('isAdmin')  <td class="actions">
                      
                        <a href="{{action('UserController@edit', $user['id'])}}" class="on-default edit-row"><i class="fas fa-edit" size:7x></i></a>
                    </td>@endcan
                    @can('isAdmin') <td> <form class="delete"  action="{{action('UserController@destroy', $user['id'])}}" method="post">
                             
                                <input name="_method" type="hidden" value="DELETE">
                                @csrf
                            
                                <button type="submit" Onclick="return ConfirmDelete()"><i class="fas fa-trash-alt" size:7x ></i></button>
                              </form>
                        {{--<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>--}}
                    </td>@endcan
            </tr>
            @endforeach
  

     
    
   
    
      
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted"></div>
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