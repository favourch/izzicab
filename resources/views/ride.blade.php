@extends('user.layout.app')

@section('content')
    <div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
        <div class="banner-overlay"></div>
        <div class="container">
            <div class="col-md-8">
                <h2 class="banner-head"><span class="strong">Always the ride you want</span><br>The best way to get wherever you’re going</h2>
            </div>
            <div class="col-md-4">
                <div class="banner-form">
                    <div class="row no-margin fields">
                        <div class="left">
                            <img src="{{asset('asset/img/ride.jpg')}}">
                        </div>
                        <div class="right">
                            <a href="{{url('login')}}">
                                <h3>Ride with {{Setting::get('site_title','Tranxit')}}</h3>
                                <h5>SIGN IN <i class="fa fa-chevron-right"></i></h5>
                            </a>
                        </div>
                    </div>
                    <div class="row no-margin fields">
                        <div class="left">
                            <img src="{{asset('asset/img/drive.jpg')}}">
                        </div>
                        <div class="right">
                            <a href="{{url('register')}}">
                                <h3>Sign up to Ride</h3>
                                <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                            </a>
                        </div>
                    </div>

                    <p class="note-or">Or <a href="{{url('provider/login')}}">sign in</a> with your driver account.</p>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row white-section no-margin">
        <div class="container">
            
            <div class="col-md-4 content-block small">
                <h2>Tap the app, get a ride</h2>
                <div class="title-divider"></div>
                <p>{{ Setting::get('site_title', 'Tranxit')  }} is the smartest way to get around. One tap and a car comes directly to you. Your driver knows exactly where to go. And you can pay with either cash or card.</p>
            </div>

            <div class="col-md-4 content-block small">
                <h2>Choose how to pay</h2>
                <div class="title-divider"></div>
                <p>When you arrive at your destination, either pay with cash or have your card automatically charged. With {{ Setting::get('site_title', 'Tranxit') }}, the choice is yours.</p>
            </div>

            <div class="col-md-4 content-block small">
                <h2>You rate, we listen</h2>
                <div class="title-divider"></div>
                <p>Rate your driver and provide anonymous feedback about your trip. Your input helps us make every ride a 5-star experience.</p>
            </div>


        </div>
    </div>

    <div class="row gray-section no-margin">
        <div class="container">                
            <h2 class="sub-head"><span class="strong">There’s a ride for every price</span><br>And any occasion</h2>

            <div class="car-tab">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#economy">KEKE</a></li>
                  <li><a data-toggle="tab" href="#premium">STANDARD</a></li>
                  <li><a data-toggle="tab" href="#accessibility">PREMIUM</a></li>
                </ul>

                <div class="tab-content">
                  <div id="economy" class="tab-pane fade in active">
                    <div class="car-slide">
                        <img src="{{asset('/asset/img/keke.jpg')}}">
                    </div>
                  </div>
                  <div id="premium" class="tab-pane fade">
                    <div class="car-slide">
                        <img src="{{asset('/asset/img/car.jpg')}}">
                    </div>
                  </div>
                  <div id="accessibility" class="tab-pane fade">
                    <div class="car-slide">
                        <img src="{{asset('/asset/img/carr.jpg')}}">
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row white-section no-margin">
        <div class="container">
            
            <div class="col-md-6 content-block">
                <h2 class="two-title"><span class="light">Pricing</span><br><span class="strong">Get a fare estimate</span></h2>
                <div class="title-divider"></div>
                <form method="post" id="idForm" onsubmit="return">

                    {{ csrf_field() }}
                <div class="input-group fare-form">
                    <input type="text" class="form-control"  placeholder="Enter pickup location" id="origin-input" name="s_address">                               
                </div>

                <div class="input-group fare-form no-border-right">
                    <input type="text" class="form-control"  placeholder="Enter drop location" id="destination-input" name="d_address">
                   
                </div>
                

                <div class="input-group fare-form no-border-right">
                <select id="service_type" name="service_type" required  class="form-control">
                @foreach($services as $list_service)
                <option value="{{$list_service->id}}">{{$list_service->name}}</option>
                @endforeach
                </select>
                </div>

                 <input type="hidden" name="s_latitude" id="origin_latitude">
                    <input type="hidden" name="s_longitude" id="origin_longitude">
                    <input type="hidden" name="d_latitude" id="destination_latitude">
                    <input type="hidden" name="d_longitude" id="destination_longitude">
                    <input type="hidden" name="current_longitude" id="long">
                    <input type="hidden" name="current_latitude" id="lat">


              
                 <button type="submit" id="btnSubmit" class="full-primary-btn fare-btn">RIDE NOW</button>

                <div id="div1" class="full-primary-btn fare-btn"  style="text-align: center; display: none"></div>
                        
                <div id="div2" class="full-primary-btn fare-btn" style="text-align: center; display: none"></div>

                </form>
            </div>

            <div class="col-md-6 map-right">
                <div class="map-responsive" style="padding-bottom: 73.25%;"">
                    <div id="map" style="width: 100%; height: 450px;"></div>
                </div>                                
            </div>
            
        </div>
    </div>          

    <div class="row gray-section no-margin">
        <div class="container">                
            <div class="col-md-6 content-block">
                <h2>Safety Putting people first</h2>
                <div class="title-divider"></div>
                <p>Whether riding in the backseat or driving up front, every part of the {{ Setting::get('site_title', 'Tranxit') }} experience has been designed around your safety and security.</p>
                <a class="content-more" href="#">HOW WE KEEP YOU SAFE <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="col-md-6 img-block text-center"> 
                <img src="{{asset('asset/img/seat-belt.jpg')}}">
            </div>
        </div>
    </div>


    <div class="row find-city no-margin">
        <div class="container">
            <div class = "col-md-6">
        <h2>{{ Setting::get('site_title','Tranxit') }} is in Your City</h2>
        <ul style = "font-size: 20px;">
            <li>Enugu</li>
            <li>Awka</li>
            <li>Onitsha</li>
            <li>Asaba</li>
            <li>Abakaliki</li>
            <li>Abia</li>
            <li>Port-Harcourt</li>
            <li>Owerri</li>
            <li>Abuja</li>
            <li>Lagos</li>
        </ul>
        </div>
        <div class = "col-md-6">
            <h2>Contact Us</h2>
            <h3>We'd love to here from you!</h3>
             <ul  style = "font-size: 20px;" type = "none">
                 <li><i class = "fa fa-envelope"></i> contact@izzicab.com</li>
                 <li><i class = "fa fa-whatsapp"></i> +234 808 882 3871</li>
                 <li><i class = "fa fa-phone"></i> +234 803 739 5101</li>
             </ul>
             
        </div>
        </div>
    </div>
    <?php $footer = asset('asset/img/footer.jpg'); ?>
    <div class="footer-city row no-margin" style="background-image: url({{$footer}});"></div>
@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {

    $("#btnSubmit").click(function (event) {


    event.preventDefault();

    $.ajax({
       type: "POST",
       url: "{{url('/fare')}}",
       data: $("#idForm").serialize(),

       success: function(data)
       { 
           $("#div1").show();
           $("#div2").show();
           $("#btnSubmit").hide();
           $("#div1").html("Estimated Fare - "+data.estimated_fare+"$");
           $("#div2").html("Distance - "+data.distance+"mile(s)");


       }
     });


 

   });

});

</script>


@endsection



