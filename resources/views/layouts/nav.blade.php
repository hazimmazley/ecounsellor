
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        


    <title>E-Counsellor </title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('full/vendor/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('full/css/modern-business.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #2473ea;"  >
      <div class="container">
        <a class="navbar-brand" href="{{('/')}}">E-Counsellor</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           {{-- <li class="nav-item">
              <a class="nav-link"  style="color:white;" href="{{ url('about')}}">About</a>
            </li>--}}
            <li class="nav-item">
              <a class="nav-link" style="color:white;" href="{{ route('universities.index')}}">Universities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white;" href="{{ route('courses.index')}}">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white;" href="{{ route('posts.index')}}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:white;" href="{{ route('scholarshiplists')}}">Scholarships</a>
              </li>

             {{-- @cannot('isUser')
              <li class="nav-item">
                <a class="nav-link" style="color:white;" href="{{ route('dashboards.index')}}">Dashboard</a>
              </li>
              @endcannot--}}

              
              <li class="nav-item">
                <a class="nav-link" style="color:white;" href="{{ route('tests.index')}}">Know your strength</a>
              </li>
            {{--<li class="nav-item">
              <a class="nav-link" style="color:white;" href="{{ url('contact')}}">Contact</a>
            </li>--}}
           {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Portfolio
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
              </div>
            </li>--}}
            {{--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                <a class="dropdown-item" href="blog-post.html">Blog Post</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Other Pages
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                <a class="dropdown-item" href="faq.html">FAQ</a>
                <a class="dropdown-item" href="404.html">404</a>
                <a class="dropdown-item" href="pricing.html">Pricing Table</a>
              </div>
            </li>
            --}}

             <!-- Authentication Links -->
             @guest
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
             </li>
             <li class="nav-item">
                 @if (Route::has('register'))
                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     
                 @endif
             </li>
         @else
         <li>
          @cannot('isUser')
          <li class="nav-item">
            <a class="nav-link" style="color:white;" href="{{ route('dashboards.index')}}">Dashboard</a>
          </li>
          @endcannot
         </li>
             <li class="nav-item dropdown">
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 </div>
             </li>
          
         @endguest
          </ul>
          
   

          {{--<ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  <li class="nav-item">
                      @if (Route::has('register'))
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      @endif
                  </li>
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>--}}
        </div>
      </div>
    </nav>



    <!-- Page Content -->
    <div class="container">

            @yield('content')

    </div><br><br><br><br><br><br><br><br>
    <!-- /.container -->

    <!-- Footer -->
    {{--<footer class="py-5 " style="background-color: #4db3e9" style="color:white;"  style="  margin-bottom:30px;" width:100%;
    height:20%; >
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; E-Counsellor 2018</p>
      </div>
      <!-- /.container -->
    </footer>--}}

    <!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4"  style="background-color: #4db3e9">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Content -->
          <h5 class="font-weight-bold text-uppercase mb-4">E-Counsellor</h5>
          <p>A web-application for school leavers who want to find a suitable study place in Malaysia</p>
          <p></p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

          <ul class="list-unstyled">
          
            <li>
              <p style="color:red;">
                <a href="{{ url('about')}}">ABOUT US</a>
              </p>
            </li>
            <li>
              <p>
                <a href="{{ route('posts.index')}}">BLOG</a>
              </p>
            </li>
            <li>
              <p>
                <a href="{{ url('contact')}}">CONTACT </a>
              </p>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Contact details -->
          <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

          <ul class="list-unstyled">
            <li>
              <p>
                <i class="fas fa-home mr-3"></i> UNITEN</p>
            </li>
            <li>
              <p>
                <i class="fas fa-envelope mr-3"></i> hazimmazley@gmail.com</p>
            </li>
            <li>
              <p>
                <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            </li>
         
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

          <!-- Social buttons -->
          <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>

          <!-- Facebook -->
          <a type="button" class="btn-floating btn-fb">
            <i class="fab fa-facebook-f"></i>
          </a>
          <!-- Twitter -->
          <a type="button" class="btn-floating btn-tw">
            <i class="fab fa-twitter"></i>
          </a>
          <!-- Google +-->
          <a type="button" class="btn-floating btn-gplus">
            <i class="fab fa-google-plus-g"></i>
          </a>
          <!-- Dribbble -->
          <a type="button" class="btn-floating btn-dribbble">
            <i class="fab fa-dribbble"></i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        E-Counsellor 2018
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{url('full/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('full/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>
