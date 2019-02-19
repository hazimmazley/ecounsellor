@extends('layouts.adminnew')



<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
<body>
        @section('content')
            <h2>Create a University</h2><br/>
            <form method="post" action="{{url('universities')}}" enctype="multipart/form-data">
                @csrf
               
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">University Name:</label>
                        <input type="text" class="form-control" name="name"  placeholder="e.g. Universiti Tenaga Nasional" required>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Address:</label>
                        <input type="text" class="form-control" name="address"  placeholder="e.g. Jalan Ikram-Uniten,Kajang,Selangor" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Phone No:</label>
                        <input type="text" class="form-control" name="phoneno"  placeholder="e.g. 0334324" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label >State: </label> 
                        
            
                        {{--<input type="text" name="state_id" value= @foreach($states as $s=>$id)  id="state_name" class="form-control input-lg" placeholder="Enter State " />
                       
                             <div id="countryList">
                             </div>
                                {{ csrf_field() }}--}}
                                <select class="custom-select"  name="state" id="inputGroupSelect01" required>
                                    <option selected>Choose State</option>
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
                        
                      
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="img">Picture Size 700 x 400:</label>
                        <input type="file" name="filename" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Description:</label>
                        <textarea class="form-control" name="desc" rows="10"></textarea>
                    </div>
                </div>
                
             {{--  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <input type="file" name="filename">
                    </div>
                    
                </div>
               --}}
         
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:60px">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
      

    
           {{-- <script>
                $(document).ready(function(){
                
                 $('#state_name').keyup(function(){ 
                        var query = $(this).val();
                        if(query != '')
                        {
                         var _token = $('input[name="_token"]').val();
                         $.ajax({
                          url:"{{ route('autocomplete.fetchstate') }}",
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
                        $('#state_name').val($(this).text());  
                        $('#countryList').fadeOut();  
                    });  
                
                });
                </script>--}}
            





        </body>
        </html>

@endsection
