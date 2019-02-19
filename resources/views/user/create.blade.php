<!DOCTYPE html>

@extends('layouts.adminnew')
<html>
  <head>
    <meta charset="utf-8">
    <title>Register User</title>
  </head>
  @section('content')
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container" ><center><h2>Register a User</h2></center></div>

                <div class="card-body">
                    <form method="POST" action="{{ action('UserController@store') }}" aria-label="{{ __('Register') }}">
                        @csrf
                            <div class="row"> 
                                <div class="col-md-4"></div> 
                                    <div class="form-group col-md-4"> 
                                        <label for="Name">Name:</label>
                                         <input type="text" class="form-control" name="name" autocomplete="off"> 
                                    </div> 
                            </div> 
                            
                            <div class="row"> 
                                <div class="col-md-4"></div>
                                     <div class="form-group col-md-4">
                                              <label for="Email">Email: </label> 
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                    </div>
                            </div> 
                                    
                            <div class="row">
                                <div class="col-md-4"></div>
                                    <div class="form-group col-md-4">
                                            <label for="Password">Password: </label> 
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                    </div>
                            </div> 
            
                            <div class="row"> 
                                <div class="col-md-4"></div> 
                                    <div class="form-group col-md-4">
                                                <label for="Password">Confirm Password</label>
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                            @if ($errors->has('password'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                    </div>
                            </div>  
                            
                            <div class="row"> 
                                <div class="col-md-4"></div> 
                                    <div class="form-group col-md-4"> 
                                        <label for="Name">Role:</label>
                                        <select name="role" class="form-control" >
                  
                                            <option>Select Role</option>
                                            <option value="coordinator">Coordinator</option>
                                            <option value="sponsor">Sponsor</option>
                                            <option value="teacher">Teacher</option>
                                            
                                                      </select> 
                                    </div> 
                            </div> 
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        <center>
                                             <button type="submit" class="btn btn-primary" style="margin-left:240px;">
                                {{ __('Register') }}
                                    </button>
                                </center>
                                 </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  </body>
  @endsection
</html>