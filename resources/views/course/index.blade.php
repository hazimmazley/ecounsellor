@extends('layouts.nav')
@include('course.coursefilter')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


</head>


<body>
    @section('content')
    <div class="container">
      <!-- Page Heading -->
      <h1 class="my-4">Courses
            <small></small>
          </h1>
          
         <!-- Page Heading/Breadcrumbs -->
  
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{('/')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Courses </li>
          </ol><br>
    

  <div class="row">
        <div class="col-8">

          

        </div>
       
        <div class="col-4">
          
           
          <!-- Search form -->
         
              
          <form action="{{url('searchcourse')}}" method="GET">
            <div class="input-group">
              <div class="form-group">
            <input class="form-control " type="text" name="searchcourse" id="course_name" size="25" placeholder="Search Course" aria-label="Search" required>
            <div id="countryList" >
              </div>
            </div>
          &nbsp;&nbsp;
            {{ csrf_field() }}
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Search</button>
            </span>
          </div>
   
          </form>
         
      
      </div>
      
    </div>
      <br>
     
   
      




      <div class="row">
        
        <div class="col-3">

           
          <div class="card" style="width: 15rem;">
            <div class="card-body">
                <form action="{{url('filtercourse')}}" method="GET">
                 <div class="form-group ">
                       <label >Qualification Level: </label> 
                       <select  id="programID" name="program_id" class="form-control"  >

                        <option value="">Select Level</option>
                                   @foreach(App\Program::all() as $p) 
                                <option value="{{ $p->id }}">{{ $p->program_name }} </option>
                                   @endforeach
                                  
                                  </select>

                                  <br>
                                  <label >Field of Study: </label> 
                            
                                    <select class="custom-select"  name="field"  id="fieldName" >
                                        <option value="">Choose Field of Study</option>
                                        <option value="Accounting">Accounting & Finance</option>
                                        <option value="Agriculture">Agriculture,Forestry,fishery & Veterinary</option>
                                        <option value="Architecture">Architecture & Building</option>
                                        <option value="Art">Art & Design</option>
                                        <option value="Media ">Audio & Media</option>
                                        <option value="Administration">Business Management & Administration</option>
                                        <option value="Communication">Communication & Broadcasting</option>
                                        <option value="Computing">Computing & IT</option>
                                        <option value="Education">Education (Teacher Training & Education Sciences)</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Hospitality">Hospitality & Tourism</option>
                                       <option value="Languages">Languages</option>
                                       <option value="Law">Law</option>
                                       <option value="Manufacturing">Manufacturing & Processing</option>
                                       <option value="Marketing">Marketing & Sales</option>
                                       <option value="Mathematic">Mathematic & Statistics</option>
                                       <option value="Medical">Medical Diagnostic & Treatment Technology</option>
                                      <option value="Medicine">Medicine & Healthcare</option>
                                      <option value="Science">Science(Life Science/Physical Science/Applied Science</option>
                                      </select>
                                      <br><br>
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <button  id="findBtn" class="btn btn-secondary" >Search</button>&nbsp;&nbsp;
                                     </div>
                                     
                </form>
            </div>
          </div>
              
          {{--  <div class="card" style="width: 15rem;">
                <div class="card-body">


                  

            </div>
              </div>--}}
       
        </div>



        <div class="col-9">




            @foreach($courses as $course)

            {{--displaykan course yg ade gambar saje--}}
            @if (!empty($course->universities->university_img))

            <div class="card">
                <h5 class="card-header"><a href="{{action('CourseController@show', $course['id'])}}  " style="color:black">{{$course['course_name']}}</a></h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                          <a href="{{action('UniversityController@show', $course['university_id'])}}"  >    
                    <img class="card-img-top"  src="{{ asset('images/'.$course->universities->university_img) }}"  alt="" style="width:150px;height:100px; ">
                  </a>
                  </div>
                        <div class="col-sm-3">Course Fee &nbsp;</i>:<br>(RM){{$course['course_fee']}}</div>
                        <div class="col-sm-3">Duration &nbsp;<i class="far fa-clock" far-5x></i>:<br>{{$course['course_duration']}} Years </div>
                        <div class="col-sm-3"> Intake Month &nbsp; <i class="far fa-calendar-check"></i>:<br>{{$course['intake']}}</div>
                      </div>
                  </div>
                </div><br>

                @endif
                @endforeach
              </div>
                
              </div>
              
           


      
                     
               
            </div>
          </div>
        




          <div>
                <!-- Pagination -->
                <ul class="pagination justify-content-center">
                 {{-- {!!$courses->links();!!}--}}
                  {{ $courses->links() }}
                 {{-- {{ $courses->appends(['program_id' => '$courses->program_id' ,'field' => '$courses->field'])->links() }}--}}
                </ul>
              </div>




             
<script>
    $(document).ready(function(){
    
     $('#course_name').keyup(function(){ 
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetchcourse') }}",
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
            $('#course_name').val($(this).text());  
            $('#countryList').fadeOut();  
        });  
    
    });
    </script>
    

    
@if(!empty(Session::get('success')))
<script>
$(function() {
  alert("Please Select atleast 1 from dropdown options");
});
</script>
@endif

              @endsection 
</body>



</html>





