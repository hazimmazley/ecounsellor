
<!DOCTYPE html>
@extends('layouts.nav')
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> E-Counsellor</title>

    <!-- Bootstrap core CSS -->
    <link href="full/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="full/css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('http://csit.uniten.edu.my/images/csit/slider/SGS_web.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Uniten</h3>
              <p></p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('https://eduadvisor.my/articles/wp-content/uploads/2017/03/SEGi-University-and-Colleges-Open-Day-March-2017-Feature.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3></h3>
              <p></p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://puteramic.com/wp-content/uploads/2017/03/d4289c85-587a-48a1-99a7-8350553941e6-1.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Yayasan Tenaga Nasional</h3>
              <p></p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    @section('content')
    <!-- Page Content -->
    <div class="container">

      <center><h1 class="my-4">What do you wanna be tomorrow?</h1></center>

      <!-- Marketing Icons Section -->
      {{--<div class="row">
      @foreach($courses as $c)
      
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"> {{$c->course_name}}</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a  href="{{action('CourseController@show', $c->id)}} " class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      
      @endforeach
    </div>--}}
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Featured Universities</h2>
<br>
      <div class="row">
          @foreach($universities as $u)
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center> <a href="{{action('UniversityController@show', $u->id)}}"  >
              <img class="card-img-top" src="{{ asset('images/'.$u->university_img) }}"alt=""  style="width:250px;height:150px;"></a>
            </center>
            <div class="card-body">
              <h4 class="card-title">
                <a href="{{action('UniversityController@show', $u->id)}}">{{$u->university_name}}</a>
              </h4>
              <p class="card-text">{{substr(strip_tags($u->description),0,100)}}{{strlen($u->description) > 100? "..." : "" }}</p>
            </div>
          </div>
        </div>
      @endforeach
     
     
     
     
      </div>
      <!-- /.row -->
<br>
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <a href="{{action('PostController@show', $posts[0]->id)}}"  ><h2><!---->{{$posts[0]->post_name}}</h2></a>
          <p>Pick a place and time</p>
          <ul>
           
            <li>Set up your study space – Your study space should be quiet, comfortable and distraction-free.</li>
            <li>Find your best time – Some people work better in the morning. Others work better at night. Work out which time suits you and plan to study then. </li>
            
          </ul>
          <p>Everyone has their own idea about the best place and time to study. Whether it's your bedroom at night or the library after school, find a study space and a regular study time that works for you and stick with it.</p>
        </div>
        <div class="col-lg-6"><a href="{{action('PostController@show', $posts[0]->id)}}"  >
          <img class="img-fluid rounded" src="{{ asset('images/'.$posts[0]->post_img) }}" alt="" style="width:750px;height:400px;"></a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
     {{-- <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
      </div>--}}

    </div>
    <!-- /.container -->

    <!-- Footer -->
   {{-- <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>--}}

    <!-- Bootstrap core JavaScript -->
   {{-- <script src="full/vendor/jquery/jquery.min.js"></script>
    <script src="full/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

  </body>
@endsection


</html>
