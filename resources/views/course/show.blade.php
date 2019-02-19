@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Course Detail</title>
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    
    
  
     <!-- Custom styles for this template -->
     <link href="{{url('coursecss/coursecss.css')}}" rel="stylesheet">

  </head>

  @section('content')
<div class="container">


        <h1 class="my-4">{{$courses['course_name']}}<br>
                <small>{{$courses->universities->university_name}}</small>
              </h1>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{('/')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item active"> <a href="{{ route('courses.index')}}">Courses</a> </li>
                  <li class="breadcrumb-item active">  {{$courses['course_name']}} </li><br>
                </ol>
        
    
      <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
              
         </div>
          </div>

          <div class="row content">
           
             {{-- <div class="col-sm-2 sidenav">
                  <p><a href="#"></a></p>
                  <p><a href="#"></a></p>
                  <p><a href="#"></a></p>
                </div>--}}
            <div class="col-sm-8 text-left"> 
                <img class="img-fluid" src="" alt="" style="width:400px;height:180px;"><br><br>
              <h1></h1>
              <table class="table">
               
                <tbody>
                    <tr>
                        <td scope="row"><i class="fas fa-book"></i> &nbsp; Course</td>
                        <td>{{$courses['course_name']}}</td>
                      
                      </tr>
                    <tr>
                        <td scope="row"><i class="fas fa-university"></i> &nbsp; University</td>
                        <td>{{$courses->universities->university_name}}</td>
                      
                      </tr>
                  <tr>
                      <td scope="row"><i class="fas fa-graduation-cap"></i>&nbsp; Level</td>
                      <td>{{$courses->programs->program_name}}</td>
                    
                  </tr>
                  <tr>
                      <td scope="row"><i class="far fa-calendar-plus"></i>&nbsp;&nbsp;&nbsp; Duration</td>
                      <td>{{$courses['course_duration']}} &nbsp;years</td>
                
                  </tr>
                  <tr>
                      <td scope="row"><i class="fas fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Intake</td>
                      <td>{{$courses['intake']}}</td>
                  
                  </tr>
                  <tr>
                      <td scope="row"><i class="fas fa-credit-card"></i>&nbsp;&nbsp;&nbsp;&nbsp; Fee</td>
                      <td>RM {{$courses['course_fee']}}</td>
                  
                  </tr>
                  <tr>
                      <td scope="row"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;&nbsp;&nbsp;Requirement</td>
                      <td> {!!$courses->requirement!!}</td>
                    
                    </tr>
                </tbody>
              </table>
              
              <hr>
            
              <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Register your interest through E-Counsellor</div>
        
                        <form method="post" action="{{url('apply')}}" enctype="multipart/form-data">
                          @csrf<br>
                          <div class="form-group">
                            <label for="uvt">University:</label>
                            <input type="text" class="form-control" name="university"  id="uvt" required>
                          </div>
                          <div class="form-group">
                            <label for="crs">Course:</label>
                            <input type="text" class="form-control" name="course" id="crs" required>
                          </div>
                          <div class="form-group">
                            <label for="usr">Full Name:</label>
                            <input type="text" class="form-control" name="name"  id="usr" required>
                          </div>
                          <div class="form-group">
                            <label for="no">Contact No.:</label>
                            <input type="text" class="form-control" name="contactno"  id="no" required>
                          </div>
                          <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email"  id="email" required>
                          </div>

                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4" style="margin-top:60px">
                                <button type="submit" class="btn btn-success"  >Apply</button>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
              
          
            </div>
            <div class="col-sm-2 sidenav">
              <div class="well">
                <p></p>
              </div>
              <div class="well">
                <p></p>
              </div>
            </div>
          </div>
        </div>

</div>
<br><br>

@if(!empty(Session::get('success')))
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>
@endif

<!-- Modal Success Popup -->
<div class="modal fade success-popup" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Thank You !</h4>
      </div>
      <div class="modal-body text-center">
         <img src="https://pageengage.homeasap.com/wp-content/uploads/2017/12/PE-Success-Icon.png"  style="width:100px;height:100px;">
          <p class="lead">Register form successfully Recorded. Thank you, We will get back to you soon!</p>
          <a href="{{('/')}}" class="rd_more btn btn-default">Go to Home</a>
      </div>
      
    </div>
  </div>
</div>

@endsection
</body>
</html>