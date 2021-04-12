@extends('Fronted.layouts.master')

@section('title')
    Sign up
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">Sign Up</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <section class="login">
        <div class="container">
            <!--====================================================================
   Start Contact Form Section
=====================================================================-->
            <div class="contact-form login">
                <div class="container">
                    <div class="contact-form-inner">
                        <div class="section-title text-center mb-95">
                            <h2>Sign Up</h2>
                        </div>
                        <form id="sign_upForm" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cars">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cars">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cars">Email </label>
                                        <input type="text" name="email" id="email" class="form-control" value="" required="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cars">Phone Number</label>
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control" value="" required="" placeholder=" ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">city</label>
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">What is your gender?</label>
                                    <div class="form-group">
                                        <input type="text" name="gender" id="gender" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">height</label>
                                    <div class="form-group">
                                        <input type="text" name="height" id="height" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">weight</label>
                                    <div class="form-group">
                                        <input type="text" name="weight" id="weight" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">desired weight</label>
                                    <div class="form-group">
                                        <input type="text" name="desired_weight" id="desired_weight" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">How healthy is your current lifestyle?</label>
                                    <div class="form-group">
                                        <input type="text" name="current_lifestyle" id="current_lifestyle" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cars">Do you take any medications? If yes, list the names and dosages.</label>

                                        <textarea name="medications" id="medications" class="form-control" rows="7" required="" placeholder=""></textarea>

                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button id="save" type="submit" class="theme-btn style-two">Sign up</button>
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


@endsection

@section('script')
    @include('Admin.includes.scripts.AlertHelper')

    <script>
        $('#sign_upForm').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('applying your request', 'info', 'processing your request', false);
            var formData = new FormData($('#sign_upForm')[0]);
            $.ajax({
                url: '/saveUser',
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

