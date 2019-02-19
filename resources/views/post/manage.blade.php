
@extends('layouts.adminnew')

<body>


    @section('content')
    

<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboards.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Post</li>
      </ol>


      <div class="container">
          @include('flashmessages')
      </div>



    <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                            
        
                      @can('isTeacher')  <a href="{{ route('posts.create')}}" class="btn btn-primary "> Add New Post <i class="fa fa-plus"></i></a>@endcan
                    </div>
                </div>
            </div>
            <br>
        
        
           <!-- DataTables Example -->
           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Post Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Body</th>
                            <th>Category</th>
                            <th>Publish Date</th>
                            @can('isTeacher') <th>Edit</th>@endcan
                            @can('isTeacher')<th>Delete</th>@endcan
                    </tr>
                  </thead>
         
                  <tbody>
        

                     

                        @foreach($posts as $post)

                        {{--@if($post->user_id == $user_id = Auth::user()->id)--}}
                    <tr>
                            <td>{{$post['id']}}</td>
                <td>{{$post['post_name']}}</td>
                <td  align="center">
                  <img class="card-img-top" src="{{ asset('images/'.$post->post_img) }}"alt=""   
                  style="width:120px;height:80px;"></td>
                  
                <td>{{substr(strip_tags($post->description),0,50)}}{{strlen($post->description) > 50? "..." : "" }}</td>
               <td> {{$post->categories->category_name ?? '' }} </td>
                <td>{{$post['posted_on']}}</td>
                @can('isTeacher') <td class="actions">
                    
                    <a href="{{action('PostController@edit', $post['id'])}}" class="on-default edit-row"><i class="fas fa-edit"></i></a>
                </td>@endcan
                @can('isTeacher') <td> <form action="{{action('PostController@destroy', $post['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" Onclick="return ConfirmDelete()"><i class="fas fa-trash-alt" size:7x ></i></button>
                          </form>
                           
                    {{--<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>--}}
                </td>@endcan
                    </tr>
                    {{--@endif--}}
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