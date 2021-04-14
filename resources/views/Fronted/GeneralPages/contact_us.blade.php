@extends('Fronted.layouts.master')

@section('title')
    {{trans('hanadi.Contact')}}
@endsection

@section('content')

    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">{{trans('hanadi.Contact')}}</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{trans('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('hanadi.Contact')}}</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <div class="contact-info mt-150 rmt-125">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="info-content">
                            <span>{{about()->phone1}}</span>
                            <span>{{about()->phone2}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="info-content">
                            <span>{{about()->address}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="flaticon-mail"></i>
                        </div>
                        <div class="info-content">
                            <span>{{about()->support_email}}</span>
                            <span>{{about()->team_email}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form">
        <div class="container">
            <div class="contact-form-inner">
                <div class="section-title text-center mb-95">
                    <h2>{{trans('hanadi.Get_In_Touch')}}</h2>
                </div>
                <form id='contactform' action="{{route('General.contacts')}}" name="contactform">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="first_name" class="form-control" value="" required="" placeholder="Name Here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" value="" required="" placeholder="Email Here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" name="phone" id="phone-no" class="form-control" value="" required="" placeholder="Phone No.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" value="" required="" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-60">
                                <textarea name="massage" id="massage" class="form-control" rows="7" required="" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button id="save" type="submit" class="theme-btn style-two" >Send Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="contact-map" id="map"></div>

@endsection

@section('script')
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUmz_Riose169lAsGLx3ckI4rsCYFnpyU&callback=initMap">
    </script>
    <script type="text/javascript">
        function initialize() {
            var latlng = new google.maps.LatLng("{{about()->lat}}","{{about()->lng}}");
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 13
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: false,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', function() {
                var iwContent = '<div id="iw_container">' +
                    '<div class="iw_title"><b>Location</b> : Noida</div></div>';
                // including content to the infowindow
                infowindow.setContent(iwContent);
                // opening the infowindow in the current map and at the current marker location
                infowindow.open(map, marker);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    @include('Admin.includes.scripts.AlertHelper')
    <script>
        $('#contactform').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('applying your request', 'info', 'processing your request ', false);
            var formData = new FormData($('#contactform')[0]);
            $.ajax({
                url: '/contact_us',
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status == 1) {

                        $("#save").attr("disabled", false);

                        $.toast().reset('all');
                        swal(data.message, {
                            icon: "success",
                        });
                        $('#contactform')[0].reset();
                    }
                }
            });
        })
    </script>
    @endsection