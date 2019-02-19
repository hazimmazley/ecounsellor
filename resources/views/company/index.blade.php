@extends('layouts.adminnew')

<body>


    @section('content')
    
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('dashboards.index')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Company</li>
          </ol>
          <div class="container">
              @include('flashmessages')
          </div>
    


    <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                            
        
                      @can('isSponsor') <a href="{{ route('companies.create')}}" class="btn btn-primary "> Add New Company <i class="fa fa-plus"></i></a>@endcan
                    </div>
                </div>
            </div>
            <br>
        
        
           <!-- DataTables Example -->
           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Company Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Description</th>
                            @can('isSponsor') <th>Edit</th>@endcan
                            @can('isSponsor')<th>Delete</th>@endcan

                    </tr>
                  </thead>
         
                  <tbody>
        
                        @foreach($companies as $company)
                    <tr>
                            <td>{{$company['id']}}</td>
                <td>{{$company['company_name']}}</td>
                <td>{{$company['description']}}</td>
                @can('isSponsor')  <td class="actions">
                    
                    <a href="{{action('CompanyController@edit', $company['id'])}}" class="on-default edit-row"><i class="fas fa-edit"></i></a>
                </td>@endcan
                
                @can('isSponsor')<td>
                  <form action="{{action('CompanyController@destroy', $company['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
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


    {{--
    <div class ="text-center">
            {!!$companies->links();!!}
        </div>--}}

        <script>
          function ConfirmDelete()
          {
            return confirm("Are you sure you want to delete?");
          }
          </script>
    
    @endsection
    
    </body>