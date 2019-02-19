@extends('layouts.adminnew')
<body>


        @section('content')
        

<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboards.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>

      <div class="container">
          @include('flashmessages')
      </div>




        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-md">
                                
            
                          @can('isCoordinator')     <a href="{{ route('courses.create')}}" class="btn btn-primary "> Add New Course<i class="fa fa-plus"></i></a>@endcan
                        </div>
                    </div>
                </div>
                <br>
            
            
               <!-- DataTables Example -->
               <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                Courses Data Table </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Course Duration</th>
                                <th>Course Fee</th>
                                <th>Intake</th>
                                <th>Field of Study</th>
                                <th>Requirement</th>
                                <th>University</th>
                                <th>Program</th>
                               {{-- <th>Scholarships</th>--}}
                               @can('isCoordinator') <th>Edit</th>@endcan
                               @can('isCoordinator') <th>Delete</th>@endcan
                                
                        </tr>
                      </thead>
             
                      <tbody>
            
                            @foreach($courses as $course)
                           {{-- @if($course->user_id == $user_id = Auth::user()->id)--}}
                        <tr>
                                <td>{{$course['id']}}</td>
                                <td>{{$course['course_name']}}</td>
                                <td>{{$course['course_duration']}}</td>
                                <td>{{$course['course_fee']}}</td>
                                <td>{{$course['intake']}}</td>
                                <td>{{$course['field']}}</td>
                                <td>{{substr(strip_tags($course->requirement),0,50)}}{{strlen($course->requirement) > 50? "..." : "" }}</td>
                               <td> {{$course->universities->university_name ?? '' }} </td>
                               <td> {{$course->programs->program_name ?? '' }} </td>
                              {{-- <td> @foreach($course->scholarships as $s) 
                                {{$s->scholarship_name}} <br>
                                 @endforeach </td>--}}
                          
                                 @can('isCoordinator')   <td class="actions">
                                   
                                    <a href="{{action('CourseController@edit', $course['id'])}}" class="on-default edit-row"><i class="fas fa-edit"></i></a>
                                </td>@endcan
                                @can('isCoordinator')    <td>
                                     <form action="{{action('CourseController@destroy', $course['id'])}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE"  >
                                            <button type="submit" Onclick="return ConfirmDelete()"><i class="fas fa-trash-alt" size:7x ></i></button>
                                          </form>
                                          
                                    {{--<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>--}}
                                </td>@endcan
                        </tr>
                      {{--  @endif--}}
                        @endforeach
              
    
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
 

             
        @endsection
         <script>
                function ConfirmDelete()
                {
                  return confirm("Are you sure you want to delete?");
                }
                </script>
        </body>