@extends('Fronted.layouts.master')

@section('title')
    {{trans('hanadi.programs')}}
@endsection

@section('content')

    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">{{trans('hanadi.programs')}}</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{trans('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('hanadi.programs')}}</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <section class="program-section my-150 rmt-125 rmb-100">
        <div class="container">
            @foreach($program as $row)
            <div class="row align-items-center">
                @if(getlang()=='en')
                <div class="col-md-3">
                    <div class="programs">
                        <img src="/images/Programs_images/{{$row->image}}" class="img-fluid">
                        <h4>{{$row->program_name_en}}</h4>
                        <p>{{substr($row->about_program_en,0,100)}}</p>
                        <a href="{{route('Programs.singlePrograms',$row->id)}}" class="theme-btn">{{trans('hanadi.MORE_DETAILS')}}</a>
                    </div>
                </div>
                    @else
                    <div class="col-md-3">
                        <div class="programs">
                            <img src="/images/Programs_images/{{$row->image}}" class="img-fluid">
                            <h4>{{$row->program_name_ar}}</h4>
                            <p>{{substr($row->about_program_ar,0,100)}}</p>
                            <a href="{{route('Programs.singlePrograms',$row->id)}}" class="theme-btn">{{trans('hanadi.MORE_DETAILS')}}</a>
                        </div>
                    </div>
                    @endif
            </div>
                @endforeach
            </div>
    </section>


@endsection