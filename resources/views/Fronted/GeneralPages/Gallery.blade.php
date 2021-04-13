@extends('Fronted.layouts.master')

@section('title')
    Gallery
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">Gallery</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <section class="gallery-section  mt-150 mb-120 rmb-70">
        <div class="container">


            <div class="row gallery-active">

                <!-- single-portfolio item-->
                @foreach($gallery as $row)
                <div class="grid-item col-lg-3 col-md-3">
                    <div class="gallery-item">
                        <img src="/images/Gallery/{{$row->image}}" class="img-fluid" alt="">
                        <div class="gallery-hover">
                            <a class="gallery-popup-link" href="/images/Gallery/{{$row->image}}"><i class="fas fa-link"></i></a>
                            <h4>{{$row->title_en}}</h4>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>

        </div>
    </section>

@endsection