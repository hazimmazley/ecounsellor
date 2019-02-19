
@extends('layouts.adminnew')
<body>
@section('content')

   <!-- Breadcrumbs-->
   <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboards.index')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
      </ol>

        <!-- Icon Cards-->
         
         <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-primary o-hidden h-30">
                    <div class="card-body">
                      <div class="card-body-icon">
                            <i class="fas fa-users"></i>
                      </div>
                      <div class="mr-5">Users: {{ $userCount}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('users.index')}}">
                      <span class="float-left">View </span>
                      <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-warning o-hidden h-30">
                    <div class="card-body">
                      <div class="card-body-icon">
                            <i class="fas fa-university"></i>
                      </div>
                      <div class="mr-5">Universities: {{ $universityCount}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1"  href="{{ route('universitiesmanage')}}">
                      <span class="float-left">View </span>
                      <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-success o-hidden h-30">
                    <div class="card-body">
                      <div class="card-body-icon">
                            <i class="fas fa-book"></i>
                      </div>
                      <div class="mr-5">Courses: {{ $courseCount}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('coursesmanage')}}">
                      <span class="float-left">View </span>
                      <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                      </span>
                    </a>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-danger o-hidden h-30">
                    <div class="card-body">
                      <div class="card-body-icon">
                            <i class="fab fa-blogger-b"></i>
                      </div>
                      <div class="mr-5">Blogs: {{ $postCount}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('postsmanage')}}">
                      <span class="float-left">View </span>
                      <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                      </span>
                    </a>
                  </div>
                </div>
              

                      <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-success  o-hidden h-30">
                              <div class="card-body">
                                <div class="card-body-icon">
                                        <i class="fas fa-building"></i>
                                </div>
                                <div class="mr-5">Companies: {{ $companyCount}}</div>
                              </div>
                              <a class="card-footer text-white clearfix small z-1" href="{{ route('companies.index')}}">
                                <span class="float-left">View </span>
                                <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                                </span>
                              </a>
                            </div>
                          </div>

                          <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-warning   o-hidden h-30">
                                  <div class="card-body">
                                    <div class="card-body-icon">
                                            <i class="fas fa-file"></i>
                                    </div>
                                    <div class="mr-5">Post Categories: {{ $categoryCount}}</div>
                                  </div>
                                  <a class="card-footer text-white clearfix small z-1"  href="{{ route('categories.index')}}">
                                    <span class="float-left">View</span>
                                    <span class="float-right">
                                      <i class="fas fa-angle-right"></i>
                                    </span>
                                  </a>
                                </div>
                              </div>

                          


                              
                          <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-primary   o-hidden h-30">
                                  <div class="card-body">
                                    <div class="card-body-icon">
                                            <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <div class="mr-5">Scholarships: {{ $scholarshipCount}}</div>
                                  </div>
                                  <a class="card-footer text-white clearfix small z-1" href="{{ route('scholarships.index')}}">
                                    <span class="float-left">View </span>
                                    <span class="float-right">
                                      <i class="fas fa-angle-right"></i>
                                    </span>
                                  </a>
                                </div>
                              </div>


                              <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-warning   o-hidden h-30">
                                  <div class="card-body">
                                    <div class="card-body-icon">
                                            <i class="fas fa-file"></i>
                                    </div>
                                    <div class="mr-5">Student Interest Record: {{ $applyCount}}</div>
                                  </div>
                                  <a class="card-footer text-white clearfix small z-1"  href="{{ route('apply.index')}}">
                                    <span class="float-left">View</span>
                                    <span class="float-right">
                                      <i class="fas fa-angle-right"></i>
                                    </span>
                                  </a>
                                </div>
                              </div>
              </div>

               <!-- Area Chart Example-->
         {{-- <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-area"></i>
                  Area Chart Example</div>
                <div class="card-body">
                  <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>--}}

      @endsection
    </body>