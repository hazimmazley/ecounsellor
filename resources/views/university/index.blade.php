
<!DOCTYPE html>
<html lang="en">
@extends('layouts.nav')
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Counsellor | Universities </title>

    <!-- Bootstrap core CSS -->
    <link href="threecol/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="threecol/css/3-col-portfolio.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      



  </head>

  <body>
    

      {{--<div class="container box">
         <br>
          <br>
          <div class="form-group">
           <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Enter University Name" />
           <div id="countryList">
           </div>
          </div>
          {{ csrf_field() }}
         </div>--}}

    <!-- Navigation -->
    
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Universities
          <small></small>
        </h1>

         <!-- Page Heading/Breadcrumbs -->
  
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{('/')}}">Home</a>
          </li>
          <li class="breadcrumb-item active">Universities </li>
        </ol><br>



        <div class="row">
            <div class="col-4"> 
              <form action="{{url('filterstate')}}" method="GET">
       
                  <div class="input-group">
                      <div class="form-group">
                          <select name="state" class="form-control" >
                            <option value="alllocations">All Location</option>
                            
                              <option value="Johor">Johor</option>
                              <option value="Kedah">Kedah</option>
                              <option value="Kelantan">Kelantan</option>
                              <option value="Melaka">Melaka</option>
                              <option value="Negeri Sembilan ">Negeri Sembilan</option>
                              <option value="Pahang">Pahang</option>
                              <option value="Perak">Perak</option>
                              <option value="Perlis">Perlis</option>
                              <option value="Pulau Pinang">Pulau Pinang</option>
                              <option value="Sabah">Sabah</option>
                              <option value="Sarawak">Sarawak</option>
                             <option value="Selangor">Selangor</option>
                             <option value="Terengganu">Terengganu</option>
                                        </select>
                  </div>&nbsp;&nbsp;
                    {{ csrf_field() }}
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="submit">Search</button>
                    </span>
                  </div>
                                        
           </form>
</div>
            <div class="col-4">

            </div>
         
            <div class="col-4">
              
              <!-- Search form -->
              

             
  <form action="{{url('search')}}" method="GET">
    


      <div class="input-group">
          <div class="form-group">
             
                  <input  class="form-control" type="text"  name="country_name" id="country_name"  size="25" placeholder="Search University Name" required />
                  <div id="countryList"   >
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
          <br><br>

          <div class="row">
              
              
                
                @foreach($universities as $u)
                  <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100"><br>
                     <center> <a href="{{action('UniversityController@show', $u['id'])}}"  >
                      <img class="card-img-top" src="{{ asset('images/'.$u->university_img) }}"alt=""  style="width:250px;height:150px;"></a>
                    </center>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="{{action('UniversityController@show', $u['id'])}}"  >{{$u['university_name']}}</a>
                        </h4>
                      <p class="card-text">{{substr(strip_tags($u->description),0,100)}}{{strlen($u->description) > 100? "..." : "" }}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                
            </div>
      



      {{--<div class="row">
         

      </div>--}}
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
          {!!$universities->links();!!}
      </ul>

    </div><br><br><br>
    <!-- /.container -->

    {{--<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>--}}

    <!-- Bootstrap core JavaScript -->


    <!--Javascript Autocomplete-->
    
<script>
    $(document).ready(function(){
    
     $('#country_name').keyup(function(){ 
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch') }}",
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
            $('#country_name').val($(this).text());  
            $('#countryList').fadeOut();  
        });  
    
    });
    </script>
 



    <script src="threecol/vendor/jquery/jquery.min.js"></script>
    <script src="threecol/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    

  </body>
 
</html>
