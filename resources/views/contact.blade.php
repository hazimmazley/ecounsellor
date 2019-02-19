@extends('layouts.nav')


<html>
  <head> <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script></head>
 <!-- Page Content -->
 <div class="container">
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact
    
    </h1>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{('/')}}">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
       {{-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>--}}   
       <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d63750.84208866857!2d101.69974121419453!3d2.9787369418876644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x31cdcbd32f300b1d%3A0xfd29fd7e373dab16!2sUniversiti+Tenaga+Nasional%2C+Jalan+Ikram-Uniten%2C+Institut+Latihan+Sultan+Ahmad+Shah%2C+43000+Kajang%2C+Selangor%2C+Malaysia!3m2!1d2.9787375!2d101.7348466!5e0!3m2!1sen!2smy!4v1547305429668" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>  </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>
          UNITEN
          <br>Kajang,Selangor
          <br>
        </p>
        <p>
          <abbr title="Phone">P</abbr>: (123) 456-7890
        </p>
        <p>
          <abbr title="Email">E</abbr>:
          <a href="mailto:">hazimmazley@gmail.com
          </a>
        </p>
     
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Send us a Message</h3>
        <form method="post" action="{{url('contacts')}}" enctype="multipart/form-data">
          @csrf
          <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="tel" class="form-control" id="phone" name="phoneno" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" id="email"  name="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div ></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


  
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
          <p class="lead">Contact form successfully Recorded. Thank you, We will get back to you soon!</p>
          <a href="{{('/')}}" class="rd_more btn btn-default">Go to Home</a>
      </div>
      
    </div>
  </div>
</div>
</html>