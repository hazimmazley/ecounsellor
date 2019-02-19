@extends('layouts.nav')

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Category</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

  </head>

  @section('content')
     <!-- Page Content -->
     <div class="container">

            <!-- Page Heading -->
            <h1 class="my-4">Post by Category
              <small>{{$categories->category_name}}</small>
            </h1>
                <!-- Page Heading/Breadcrumbs -->
  
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('posts.index')}}">Blog</a>
            </li>
            <li class="breadcrumb-item active">{{$categories->category_name}} </li>
          
          </ol><br>
      
            <!-- Project One -->

            @foreach($categories->posts as $category)
            <div class="row">
              <div class="col-md-7">
                <a href="#">
                  <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset('images/'.$category->post_img) }}" alt="">
                </a>
              </div>
              <div class="col-md-5">
                <h3>{{$category->post_name ?? '' }}</h3>
               <p class="card-text">{{substr(strip_tags($category->description),0,200)}}{{strlen($category->description) > 200? "..." : "" }}</p>
                <a class="btn btn-primary" href="{{action('PostController@show', $category['id'])}}" >View Article</a>
              </div>
            </div>
            <!-- /.row -->
            <hr>
            @endforeach
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
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
        </body>
        @endsection
      </html>
    