@extends('Fronted.layouts.master')

@section('title')
    {{trans('handi.Dr_Hanadi_yousif')}}
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">{{trans('handi.Dr_Hanadi_yousif')}}</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{trans('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('hanadi.Dr_Hanadi_yousif')}}</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

@include('Fronted.DrHanadi.info')
@include('Fronted.DrHanadi.latestVideo')
@include('Fronted.DrHanadi.Testimonial')

@endsection


