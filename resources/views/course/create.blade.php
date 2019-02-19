@extends('layouts.adminnew')



<html>

<head>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
        @section('content')
            <h2>Create a Course</h2><br/>
            <form method="post" action="{{url('courses')}}" enctype="multipart/form-data">
                @csrf
               
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Course Name:</label>
                        <input type="text" class="form-control" name="name"  placeholder="e.g. Bachelor of Computer Science(Software Engineering)" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                           
                                    <label  for="inputGroupSelect01">Duration:</label>
                                
                                  <select class="custom-select"  name="duration" id="inputGroupSelect01" required>
                                        <option selected>Choose Duration</option>
                                        <option value="1">1 year</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
                                        <option value="4">4 years</option>
                                      </select>
                    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Fee:</label>
                        <input type="text" class="form-control" name="fee"  placeholder="e.g. 50,000" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Email">Intake:</label>
                        <input type="text" class="form-control" name="intake"  placeholder="e.g. 3/6/9" required>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                                <label >Field of Study: </label> 
                        
            
                                {{--<input type="text" name="state_id" value= @foreach($states as $s=>$id)  id="state_name" class="form-control input-lg" placeholder="Enter State " />
                               
                                     <div id="countryList">
                                     </div>
                                        {{ csrf_field() }}--}}
                                        <select class="custom-select"  name="field" id="inputGroupSelect01" required>
                                            <option selected>Choose Field of Study</option>
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
                        </div>
                    </div>
                

             {{-- <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="Email">Apply:</label>
                            <input type="text" class="form-control" name="apply">
                        </div>
                    </div>--}}
               <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label >University: </label> <select name="university_id" class="form-control" required>
                            @foreach($universities as $u) 
                            <option value="{{ $u->id }}">{{ $u->university_name }}</option>
                             @endforeach </select>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label >Program: </label> <select name="program_id" class="form-control" required>
                                @foreach($programs as $p) 
                                <option value="{{ $p->id }}">{{ $p->program_name }}</option>
                                 @endforeach </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="Requirement">Requirement:</label>
                            <textarea class="form-control" type="text"  name="requirement"  rows="10" ></textarea>
                        </div>
                    </div>

                   {{-- <div class="row"> 
                        <div class="col-md-4"></div> 
                                      <div class="form-group col-md-4">
                                           <label>Scholarships: </label> 
                                           <select name="scholarship_id[]" class="form-control" multiple="true" required>
                                                @foreach($scholarships as $s) <option value="{{ $s->id }}">{{ $s->scholarship_name }}
                                                </option>
                                                 @endforeach </select> 
                                                </div> 
                                            </div>--}}


                {{--
                <br>
                
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="img">Picture Size 700 x 400:</label>
                        <input type="file" name="filename">
                    </div>
                </div><br>--}}
                
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
      
        </body>
        </html>

@endsection


