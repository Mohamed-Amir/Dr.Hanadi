@extends('Fronted.layouts.master')

@section('title')
    {{trans('main.about_Us')}}
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">{{trans('main.about_Us')}}</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{trans('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('main.about_Us')}}</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

@include('Fronted.DrHanadi.info')
@include('Fronted.DrHanadi.latestVideo')
@include('Fronted.DrHanadi.Testimonial')

@endsection


