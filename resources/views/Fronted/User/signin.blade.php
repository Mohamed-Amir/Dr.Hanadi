@extends('Fronted.layouts.master')

@section('title')
    {{trans('hanadi.login')}}
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">{{trans('hanadi.login')}}</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{trans('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('hanadi.login')}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="login">
            <div class="container">
                <!--====================================================================
       Start Contact Form Section
   =====================================================================-->
                <div class="contact-form login">
                    <div class="container">
                        <div class="contact-form-inner">
                            <div class="section-title text-center mb-95">
                                <h2>{{trans('hanadi.login')}}</h2>
                            </div>
                            <form id="sign_inForm" action="{{url('User.sign_in')}}" method="post">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control" value="" required="" placeholder="{{trans('hanadi.Email')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control" value="" required="" placeholder="{{trans('hanadi.password')}}">
                                        </div>
                                    </div>


                                    <div class="col-md-12 text-center">
                                        <button id="save" type="submit" class="theme-btn style-two">{{trans('hanadi.login')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--====================================================================
                   End Contact Form Section
               =====================================================================-->

            </div>
        </section>

    </section>

@endsection
@section('script')
    @include('Admin.includes.scripts.AlertHelper')

    <script>
        $('#sign_inForm').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('applying your request', 'info', 'processing your request ', false);
            var formData = new FormData($('#sign_inForm')[0]);
            $.ajax({
                url: '/logged',
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
                        location.href='/';

                        $("#save").attr("disabled", false);
                    }
                }
            });
        })
    </script>
@endsection