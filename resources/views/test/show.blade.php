
<!DOCTYPE html>
<html lang="en">
@extends('layouts.nav')

<body>
@section('content')
 <!-- Page Heading -->
 <h1 class="my-4">
        <small></small>
      </h1>
    
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
            <img class="img-fluid" src="" alt="" style="width:400px;height:180px;"><br><br>
          <h1>  Your Strength Areas : <!--Total : {{$sum}}--></h1>
         
          @if  ($sum <= 70)
         <!-- below 70--> <h2> Homeless</h2>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job lists</th>
               
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Thief</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                        <td>Beggar</td>
                      </tr>
                      <tr>
                            <th scope="row">3</th>
                            <td>Waste picker</td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Non-profit organization</td>
                            </tr>
                 
                </tbody>
              </table>
          @elseif($sum > 70 && $sum <= 150)
          <!--between 71 and 150--><h2> Private Sector</h2>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job lists</th>
               
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Chef</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                        <td>Sportsperson</td>
                      </tr>
                      <tr>
                            <th scope="row">3</th>
                            <td>Repairperson</td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Waiter</td>
                            </tr>
                            <tr>
                                    <th scope="row">5</th>
                                    <td>Mechanic</td>
                                    </tr>
                                    <tr>
                                            <th scope="row">6</th>
                                            <td>Electrican</td>
                                            </tr>

                                            <tr>
                                                    <th scope="row">7</th>
                                                    <td>Plumber</td>
                                                    </tr>

                                                   
                 
                </tbody>
              </table>
          @elseif($sum > 151 && $sum <= 240)
          <!--between 151 and 240--><h2>Public Sector</h2>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job lists</th>
               
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Teacher</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                        <td>Cop</td>
                      </tr>
                      <tr>
                            <th scope="row">3</th>
                            <td>Fireman</td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Doctor</td>
                            </tr>
                            <tr>
                                    <th scope="row">5</th>
                                    <td>Nursing</td>
                             </tr>
                                    <tr>
                                            <th scope="row">6</th>
                                            <td>Human resourse officer</td>
                                    </tr>

                                            <tr>
                                                    <th scope="row">7</th>
                                                    <td>Flight Attendant</td>
                                             </tr>
                                             <tr>
                                                    <th scope="row">8</th>
                                                    <td>Animal Care Worker</td>
                                             </tr>
                                             <tr>
                                                    <th scope="row">9</th>
                                                    <td>Life Coach</td>
                                             </tr>

                                                   
                 
                </tbody>
              </table>
          @elseif($sum > 241 && $sum <= 320)
         <!-- between 241 and 320--> <h2>Art Sector</h2>

          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job lists</th>
               
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Writer</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                        <td>Singer</td>
                      </tr>
                      <tr>
                            <th scope="row">3</th>
                            <td>Actor/Actress</td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Painter</td>
                            </tr>
                            <tr>
                                    <th scope="row">5</th>
                                    <td>Drawer</td>
                             </tr>
                                    <tr>
                                            <th scope="row">6</th>
                                            <td>Interior Decorator</td>
                                    </tr>

                                            <tr>
                                                    <th scope="row">7</th>
                                                    <td>Journalist</td>
                                             </tr>
                                             <tr>
                                                    <th scope="row">8</th>
                                                    <td>Photographer</td>
                                             </tr>
                                             <tr>
                                                    <th scope="row">9</th>
                                                    <td>Fashion designer</td>
                                             </tr>

                                                   
                 
                </tbody>
              </table>
          @elseif($sum > 321 && $sum <= 400)
          <!--321 and 400--> <h2>Business Sector</h2>
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job lists</th>
               
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Professional Organizer</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                        <td>Accountant</td>
                      </tr>
                      <tr>
                            <th scope="row">3</th>
                            <td>Investigator</td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Lawyer</td>
                            </tr>
                            <tr>
                                    <th scope="row">5</th>
                                    <td>Web Developer</td>
                             </tr>
                                    <tr>
                                            <th scope="row">6</th>
                                            <td>Editor</td>
                                    </tr>

                                          

                                                   
                 
                </tbody>
              </table>
          @endif

    
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

@endsection
</body>
</html>