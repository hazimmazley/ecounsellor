<!DOCTYPE html>
<html lang="en">
@extends('layouts.nav')

<body>
@section('content')

<!-- Page Heading -->
<h1 class="my-4">
    <small>Career Aptitude Test</small>
  </h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{('/')}}">Home</a>
      </li>
      <li class="breadcrumb-item active">Carreer Aptitude Test </li>
    </ol><br>

  <div class="row">
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col">
      
      <!-- Search form -->
      


      </div>
  </div>

<form method="post" action="{{url('tests')}}" enctype="multipart/form-data">
    @csrf

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Career Aptitude Questions</th>
            <th scope="col">Choose</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>How would your friends describe you?</td>
            <td><div class="radio" >
                <label><input type="radio" name="optradio" value="0" required > Irresponsible</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="10"> Handle/Helpful</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="30" > Creative/Gossip</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="20" > Outgoing/Friendly</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="40" > Talk/Intelligent</label>
              </div>
            
            </td>
           
            
            
            
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Are you a lazy person?</td>
            <td><div class="radio">
                <label><input type="radio" name="optradio1" value="30" required> I have my moments of relaxation like everyone else</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio1" value="40"> Too busy to sit,I wish I could though</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio1" value="10" > I would get up, but there's nothing for me to do </label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio1" value="20" > No,Just bored sometimes</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio1" value="0" > All the time</label>
              </div>
            </td>
         
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>What is your favorite subject?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio2" value="20" required> Health/History/English</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio2" value="10"> Tech/Study skills/Gardening</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio2" value="40" > Math/Economics/Computer Science </label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio2" value="30" > Art/Drama/Music</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio2" value="0" > None</label>
                  </div>
            </td>
           
          </tr>


          <tr>
            <th scope="row">4</th>
            <td>What do you do in your spare time?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio3" value="10" required> Gym/Video games/Home renovations</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio3" value="20"> Hang out</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio3" value="0" > Wasting time </label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio3" value="40" > Surf the Web/Organize room</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio3" value="30" > Work on a hobby</label>
                  </div>
            </td>
           
          </tr>

          <tr>
            <th scope="row">5</th>
            <td>Who would you join at a social event?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio4" value="40" required> Small group having a lively discussion</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio4" value="30"> Someone who looks interesting</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio4" value="0" > No one, my only friends </label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio4" value="10" > Several people playing a game</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio4" value="20" > Large group that is laughing a lot</label>
                  </div>
            </td>
           
          </tr>

          <tr>
            <th scope="row">6</th>
            <td>Which section of the newspaper do you like to read?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio5" value="30" required> Entertainment</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio5" value="0"> None</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio5" value="40" > News or Real Estate </label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio5" value="10" > Front page /Sports</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio5" value="20" > Education/Medical /Breaking news</label>
                  </div>
            </td>
           
          </tr>

          <tr>
            <th scope="row">7</th>
            <td>Which movie genre do you like most?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio6" value="20" required> Comedy/Historical/Documentary</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio6" value="10"> Action/Horror/Adventure</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio6" value="40" > Sci-Fi/Political/Thought-provoking drama</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio6" value="0" > Parody</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio6" value="30" > Romance/Fantasy/Inspirational</label>
                  </div>
            </td>
           
          </tr>

          <tr>
            <th scope="row">8</th>
            <td>You have the chance to be on a reality show.Which would you choose?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio7" value="10" required> Show that gives me the chance to work hands-on</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio7" value="30"> One based on my talent</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio7" value="0" > I would like a show such as a comedy show</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio7" value="20" > Based on my interpersonal skills</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio7" value="40" > All reality shows are a waste of time</label>
                  </div>
            </td>
           
          </tr>
          <tr>
            <th scope="row">9</th>
            <td>Do you intend to rely on others in the future ?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio8" value="40" required> Never</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio8" value="0"> Yes, I have to or I'd die</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio8" value="10" > For some things to do my job</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio8" value="30" > If I need it so badly,then yes </label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio8" value="20" > Say no, only if you prefer to lie</label>
                  </div>
            </td>
           
          </tr>

          <tr>
            <th scope="row">10</th>
            <td>Which of these activities would you enjoy the most ?</td>
            <td>
                <div class="radio">
                    <label><input type="radio" name="optradio9" value="0" required> Making love it's all the time</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio9" value="20"> Teaching or helping others solve their problems</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio9" value="30" > Using my visual or musical skills to create something</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio9" value="40" > Developing a business plan </label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio9" value="10" > Using my skills to carry out tasks</label>
                  </div>
            </td>
           
          </tr>

        

        </tbody>
      </table>


  

  <div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4" style="margin-top:60px">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>




    


@endsection
</body>
</html>