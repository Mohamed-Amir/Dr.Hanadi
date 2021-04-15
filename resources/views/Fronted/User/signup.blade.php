@extends('Fronted.layouts.master')

@section('title')
    {{trans('hanadi.sign_up')}}
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">{{trans('hanadi.sign_up')}}</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{trans('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('hanadi.sign_up')}}</li>
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
                            <h2>{{trans('hanadi.sign_up')}}</h2>
                        </div>
                        <form id="sign_upForm" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cars">{{trans('hanadi.First_Name')}}</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cars">{{trans('hanadi.Last_Name')}}</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cars">{{trans('hanadi.Email')}}</label>
                                        <input type="text" name="email" id="email" class="form-control" value="" required="" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cars">{{trans('hanadi.Phone_Number')}}</label>
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control" value="" required="" placeholder=" ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">{{trans('hanadi.password')}}</label>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" value="" required="" placeholder=" ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">{{trans('hanadi.city')}}</label>
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">{{trans('hanadi.What_is_your_gender')}}</label>
                                    <div class="form-group">
                                        <input type="text" name="gender" id="gender" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">{{trans('hanadi.height')}}</label>
                                    <div class="form-group">
                                        <input type="text" name="height" id="height" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">{{trans('hanadi.weight')}}</label>
                                    <div class="form-group">
                                        <input type="text" name="weight" id="weight" class="form-control" value="" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cars">{{trans('hanadi.desired_weight')}}</label>
                                    <div class="form-group">
                                        <input type="text" name="desired_weight" id="desired_weight" class="form-control" value=""  placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="cars">{{trans('hanadi.How_healthy_is_your_current_lifestyle')}}</label>
                                    <div class="form-group">
                                        <input type="text" name="current_lifestyle" id="current_lifestyle" class="form-control" value="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cars">{{trans('hanadi.Do_you_take_any_medications_If_yes_list_the_names_and_dosages')}}</label>

                                        <textarea name="medications" id="medications" class="form-control" rows="7"  placeholder=""></textarea>

                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button id="save" type="submit" class="theme-btn style-two">{{trans('hanadi.sign_up')}}</button>
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



@endsection

