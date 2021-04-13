@extends('Fronted.layouts.master')

@section('title')
    programs
@endsection

@section('content')

    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">Program Name.</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">programs</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <section class="program-section my-150 rmt-125 rmb-100">
        <div class="container">
            @foreach($program as $row)
            <div class="row align-items-center">

                <div class="col-md-3">
                    <div class="programs">
                        <img src="/images/Programs_images/{{$row->image}}" class="img-fluid">
                        <h4>{{$row->program_name_en}}</h4>
                        <p>{{substr($row->about_program_en,0,100)}}</p>

                        <a href="{{route('Programs.singlePrograms',$row->id)}}" class="theme-btn">MORE DETAILS</a>
                    </div>
                </div>
            </div>
                @endforeach
            </div>
    </section>


@endsection