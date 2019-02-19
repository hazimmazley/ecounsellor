@extends('layouts.adminnew')
<body>


        @section('content')
        

<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboards.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">University</li>
      </ol>

      <div class="container">
          @include('flashmessages')
      </div>




        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-md">
                                
            
                          @can('isCoordinator')<a href="{{ route('universities.create')}}" class="btn btn-primary "> Add New Universities<i class="fa fa-plus"></i></a>@endcan
                        </div>
                    </div>
                </div>
                <br>
            
            
               <!-- DataTables Example -->
               <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                  Universities Data Table </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                                <th>ID</th>
                                <th>University Name</th>
                                <th>Description</th>
                                <th>Phone No</th>
                                <th>State</th>
                                <th>Image</th>
                                @can('isCoordinator') <th>Edit</th>@endcan
                                @can('isCoordinator')<th>Delete</th>@endcan
                                
                        </tr>
                      </thead>
             
                      <tbody>
            
                            @foreach($universities as $university)
                           {{-- @if($university->user_id == $user_id = Auth::user()->id)--}}
                        <tr>
                                <td>{{$university['id']}}</td>
                                <td>{{$university['university_name']}}</td>
                                <td>{{substr(strip_tags($university->description),0,50)}}{{strlen($university->description) > 50? "..." : "" }}</td>
                                <td>{{$university['phoneno']}}</td>
                               <td> {{$university['state']}} </td>
                                <td><img class="card-img-top" src="{{ asset('images/'.$university->university_img) }}"alt=""  style="width:120px;height:80px;"></td>
                                @can('isCoordinator')  <td class="actions">
                                   
                                    <a href="{{action('UniversityController@edit', $university['id'])}}" class="on-default edit-row"><i class="fas fa-edit"></i></a>
                                </td>@endcan
                                @can('isCoordinator')  <td>
                                     <form action="{{action('UniversityController@destroy', $university['id'])}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" Onclick="return ConfirmDelete()"><i class="fas fa-trash-alt" size:7x ></i></button>
                                          </form>
                                          
                                    {{--<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>--}}
                                </td>@endcan
                        </tr>
                       {{--@endif-->--}}
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
        @endsection
        
        </body>