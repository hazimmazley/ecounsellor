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
<div class="container"><br>
        <h1 class="text-center"><img class="card-img-top"  src="{{ asset('images/scholarships.png') }}"  alt=""   style="width:600px;height:100px;"> 
                <small></small>
              </h1>

                <!-- Page Heading/Breadcrumbs -->
  
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{('/')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Scholarships </li>
          </ol><br>
<div class="row">
    <div class="col-4"></div>
    
    <div class="col-4"></div>
    <div class="col-4">   

            <div class="input-group">
                    <div class="form-group">
                            <form action="{{url('searchscholarship')}}" method="GET">
                            <input class="form-control " type="text" name="searchscholarship" id="scholarship_name" size="25" placeholder="Search Scholarship" aria-label="Search" required>
                  <div id="countryList" >
                    </div>
          
                  </div>&nbsp;&nbsp;
                  {{ csrf_field() }}
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Search</button>
                  </span>
                </div>
        
               
              </form>
    
    
    </div>
  </div>
  <div class="row">
    <div class="col-3">
            
            <div class="card" style="width: 15rem;">
                    <div class="card-body">
                    <form action="{{url('filtercompany')}}" method="GET">
           
                         <div class="form-group ">
                               <label >Search by Company: </label> 
                               <select name="company" class="form-control" >
                                <option value="all">All Companies</option>
                                
                                           @foreach(App\Company::all() as $c) 
                                        <option value="{{ $c->id }}">{{ $c->company_name }} </option>
                                           @endforeach
                                          
                                          </select>
                                              <br>
                                           <button type="submit">Search</button>&nbsp;&nbsp;
                                             </div>
                                             
                      </form>
                    </div>
                  </div>                             
                                        
                            
                           
                           
            
    
   </div>
    <div class="col-9">
         
       
          
                @foreach($scholarships as $s)       <!-- Card 4 -->
          <div class="card">
              <div class="card-header"  style="color:green;">
                  <a href="{{action('ScholarshipController@show', $s['id'])}}"  >{{$s['scholarship_name']}}</a> 
                  &nbsp; Closing Date: {{$s['date']}} </div> 
                      <div class="card-body">     
                    <div class="row">
                        <div class="col-sm-3">  
                         <img class="card-img-top"  src="{{ asset('images/'.$s->scholarship_img) }}"  alt=""   style="width:150px;height:100px;"> 
                        </div>
                        <div class="col-sm-9"> <td>{{substr(strip_tags($s->detail),0,200)}}{{strlen($s->detail) > 200? "..." : "" }}</td></div>
                      </div>
                         </div>
              <div class="card-footer"  >  Sponsored By :  {{$s->companies->company_name}} </div>
               </div><br>
                           
                @endforeach
                
                  
    </div>
  </div>



  
</div><br><br>

          
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

<div>
        <!-- Pagination -->
        <ul class="pagination justify-content-center">
         {{ $scholarships->links() }} 
          {{--{!!$scholarships->links();!!}--}}
        </ul>
      </div>
        @endsection

     
    </body>
    </html>