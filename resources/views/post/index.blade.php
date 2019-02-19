@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="full/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="full/css/modern-business.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  </head>

  <body>
{{--
    --}}


    @section('content')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Article
        <small>Recent Posts</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{('/')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog </li>
      </ol>


   
      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          @foreach($posts as $post)
          <div class="card mb-4">
              <img src="{{ asset('images/'.$post->post_img) }}" />
           
            <div class="card-body">
              <h2 class="card-title">{{$post['post_name']}}</h2>
              <p class="card-text">{{substr(strip_tags($post->description),0,200)}}{{strlen($post->description) > 200? "..." : "" }}</p>
              <a href="{{action('PostController@show', $post['id'])}}"  class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on {{$post['posted_on']}} by
             <!-- <a href="#">{{$post->users->name}} </a>-->
             {{$post->users->name}}
            </div>
          </div>

          @endforeach

          
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
             {!!$posts->links();!!}
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <form action="{{url('searchpost')}}" method="GET">
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                  <div class="form-group">
                <input type="text"  name="searchpost" id="post_name"  class="form-control" placeholder="Search for...">
                <div id="countryList" >
                </div>
              </div>
                {{ csrf_field() }}
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </div>
            </div>
          </div>
        </form>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                    @foreach($categories as $category)

                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="{{action('CategoryController@show', $category['id'])}}">{{$category['category_name']}}</a>
                      </li>
                     
                    </ul>
  
                    @endforeach
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#"></a>
                    </li>
                    <li>
                      <a href="#"></a>
                    </li>
                    <li>
                      <a href="#"></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          {{--<div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
             
            </div>
          </div>--}}

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  {{--  <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
--}}
    <!-- Bootstrap core JavaScript -->
    <script src="full/vendor/jquery/jquery.min.js"></script>
    <script src="full/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    
<script>
  $(document).ready(function(){
  
   $('#post_name').keyup(function(){ 
          var query = $(this).val();
          if(query != '')
          {
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"{{ route('autocomplete.fetchpost') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
             $('#countryList').fadeIn();  
                      $('#countryList').html(data);
            }
           });
          }
      });
  
      $(document).on('click', 'li', function(){  
          $('#post_name').val($(this).text());  
          $('#countryList').fadeOut();  
      });  
  
  });
  </script>



  </body>
@endsection
</html>
