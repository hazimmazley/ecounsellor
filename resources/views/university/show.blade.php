
<!DOCTYPE html>
<html lang="en">

@extends('layouts.nav')

@section('content')
  <body>

   

    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4" >
        
         </h1><br>
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{('/')}}">Home</a>
            </li>
            <li class="breadcrumb-item active"> <a href="{{ route('universities.index')}}">Universities</a> </li>
            <li class="breadcrumb-item active">  {{$universities['university_name']}} </li><br>
          </ol>
      

      <div class="row content">
        <div class="col-sm-2 sidenav">
          <p><a href="#"></a></p>
          <p><a href="#"></a></p>
          <p><a href="#"></a></p>
        </div>
        <div class="col-sm-9 text-left"> 
           <center> <img class="img-fluid" src="{{ asset('images/'.$universities->university_img) }}" alt="" style="width:350px;height:200px;"></center>
          <!-- Portfolio Item Heading -->
      <h1 class="my-4" >
          <center> {{$universities['university_name']}}</center>
         </h1><hr>
          <h3>Address</h3>
          <p>{{$universities['address']}}</p>
          <hr>
          <h3>Phone Number</h3>
          <p>{{$universities['phoneno']}}</p>
          <hr>
          <h3>Overview</h3>
           <p>{!!$universities->description!!}</p>
          <hr>
           <!-- Related Projects Row -->
      <h3 class="my-4">Available Courses</h3>

      {{--<div class="card" style="width: 18rem;">
          <div class="card-header">
            Courses
          </div>
          
          @foreach($universities->courses as $course)
          <ul class="list-group list-group-flush">
            <li class="list-group-item">   
                <a href="{{action('CourseController@show', $course['id'])}}">{{$course['course_name']}}</a></li>
      
          </ul>
          @endforeach
        </div>--}}
        @foreach($universities->courses as $course)
        <div class="card">
            <h5 class="card-header"><a href="{{action('CourseController@show', $course['id'])}}  " style="color:black">{{$course['course_name']}}</a></h5>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-3">
                      <a href="{{action('UniversityController@show', $course['university_id'])}}"  >
                        
                <img class="card-img-top"  src="{{ asset('images/'.$course->universities->university_img) }}"  alt=""   style="width:150px;height:100px; "></a></div>
                    <div class="col-sm-3">Course Fee &nbsp;<i class="fas fa-dollar-sign"></i>:<br>(RM){{$course['course_fee']}}</div>
                    <div class="col-sm-3">Duration &nbsp;<i class="far fa-clock" far-5x></i>:<br>{{$course['course_duration']}} Years </div>
                    <div class="col-sm-3"> Intake Month &nbsp; <i class="far fa-calendar-check"></i>:<br>{{$course['intake']}}</div>

                  </div>
                
              
              </div>
            </div><br>
            @endforeach
      
        </div>
        <div class="col-sm-1 sidenav">
          <div class="well">
            <p></p>
          </div>
          <div class="well">
            <p></p>
          </div>
        </div>

          






      </div>





    
      <!-- /.row -->

      
    
      
      <!-- /.row -->

    </div><br>
    <!-- /.container -->
{{--
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="full/vendor/jquery/jquery.min.js"></script>
    <script src="full/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
--}}
@endsection


  </body>

  

</html>
