@extends('Fronted.layouts.master')

@section('title')
    Dr.Hanadi yousif
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">About me</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Me</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

@include('Fronted.DrHanadi.info')
@include('Fronted.DrHanadi.latestVideo')
@include('Fronted.DrHanadi.Testimonial')

@endsection


