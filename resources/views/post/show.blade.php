@extends('layouts.nav')


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post </title>
  {{--
	<!-- Vendor CSS -->
  <link rel="stylesheet" href="{{url('assets/vendor/bootstrap/css/bootstrap.css')}}" />  "{{url('assets/css/bootstrap.min.css')}}"
  <link rel="stylesheet" href="{{url('assets/vendor/font-awesome/css/font-awesome.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/magnific-popup/magnific-popup.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{url('assets/stylesheets/theme.css')}}" />

  <!-- Skin CSS -->
  <link rel="stylesheet" href="{{url('assets/stylesheets/skins/default.css')}}" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="{{url('assets/stylesheets/theme-custom.css')}}">
    //////////////////////////////--}}



    <!-- Bootstrap core CSS -->
    <link href="{{url('blog/vendor/bootstrap/css/bootstrap.min.css ')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('blog/css/blog-post.css ')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  </head>

  <body>
{{--
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>--}}


@section('content')
    <!-- Page Content -->
    <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('posts.index')}}">Blog</a>
      </li>
      <li class="breadcrumb-item active">{{$posts['post_name']}}</li>
    </ol>
      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"> {{$posts['post_name']}}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a >{{$posts->users->name}}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{$posts['created_at']}}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid" src="{{ asset('images/'.$posts->post_img) }}" alt="" style="width:900px;height:300px;"><br><br>

          <hr>

          <!-- Post Content -->
          <p>{!!$posts->description!!}</p>

          <hr>

          <!-- Comments Form -->
         {{-- <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>--}}

          {{--<!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>--}}

          <!-- Comment with nested comments -->
          {{--<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div>--}}

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
{{--
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>--}}

    <!-- Bootstrap core JavaScript -->
    <script src="{{url('blog/vendor/jquery/jquery.min.js ')}}"></script>
    <script src="{{url('blog/vendor/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>
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
      
    @endsection
  </body>

</html>
