@extends('layouts.adminnew')

<body>


    @section('content')
    
    
<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboards.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Program</li>
      </ol>

      <div class="container">
          @include('flashmessages')
      </div>



    <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                            
        
                            <a href="{{ route('programs.create')}}" class="btn btn-primary "> Add New Program <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <br>
        
        
           <!-- DataTables Example -->
           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Program Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                            <th>Id</th>
                            <th>Program Name</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                    </tr>
                  </thead>
         
                  <tbody>
        
                        @foreach($programs as $program)
                    <tr>
                            <td>{{$program['id']}}</td>
                            <td>{{$program['program_name']}}</td>
                            <td>{{$program['description']}}</td>
                            <td> 
                         <a href="{{action('ProgramController@edit', $program['id'])}}" class="on-default edit-row"><i class="fas fa-edit"></i></a>
                                      
                            </td><td>  <form action="{{action('ProgramController@destroy', $program['id'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" Onclick="return ConfirmDelete()"><i class="fas fa-trash-alt" size:7x ></i></button>
                                      </form>
                                {{--<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>--}}
                            </td>
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
    @endsection
    
    </body>