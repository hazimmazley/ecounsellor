@extends('layouts.nav')



<html>


        <head>
   
                
                <link href="{{ url('scholarshipdisplay/scholarshipdisplay.css') }}" rel="stylesheet" type="text/css" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
           </head>
    <body>

        @section('content')

  <!-- Page Heading -->
  <h1 class="my-4">
    <small></small>
  </h1>

         <!-- Page Heading/Breadcrumbs -->
  
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('scholarshiplists')}}">Scholarships</a>
            </li>
            <li class="breadcrumb-item active">{{$scholarships['scholarship_name']}} </li>
          </ol>

  <div class="row">
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col">
      
      <!-- Search form -->
      


      </div>
  </div>



        <div class="row content">
            <div class="col-sm-2 sidenav">
              <p><a href="#"></a></p>
              <p><a href="#"></a></p>
              <p><a href="#"></a></p>
            </div>
            <div class="col-sm-8 text-left"> 
                <img class="img-fluid" src="{{ asset('images/'.$scholarships->scholarship_img) }}" alt="" style="width:350px;height:200px;"><br><br>
              <h1>{{$scholarships['scholarship_name']}}</h1><hr>
              <p>{!!$scholarships->detail!!}</p>
              
          
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
        
{{--<div class="container">
        <h1 class="my-4">Scholarships
                <small></small>
              </h1>
<div class="row">
    <div class="col">scholarships</div>
    <div class="col">col</div>
    <div class="col">col</div>
    <div class="col">   
         <!-- Search form -->
         <form action="{{url('searchscholarship')}}" method="GET">
                <input class="form-control " type="text" name="searchscholarship" id="scholarship_name"  placeholder="Search Scholarship" aria-label="Search">
                <div id="countryList">
                  </div>
                  {{ csrf_field() }}
               
              </form>
    
    
    </div>
  </div>
  <div class="row">
    <div class="col-3">
   </div>
    <div class="col-9">
         
       
          
              
                
                  
    </div>
  </div>



  
</div>--}}


<br><br>

          
<script>
        $(document).ready(function(){
        
         $('#scholarship_name').keyup(function(){ 
                var query = $(this).val();
                if(query != '')
                {
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                  url:"{{ route('autocomplete.fetchscholarship') }}",
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
                $('#scholarship_name').val($(this).text());  
                $('#countryList').fadeOut();  
            });  
        
        });
        </script>
        @endsection


    </body>
    </html>