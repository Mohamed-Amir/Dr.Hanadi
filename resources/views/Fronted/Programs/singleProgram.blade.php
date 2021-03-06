@extends('Fronted.layouts.master')

@section('title')
    @if(getlang() =='en')
    {{$program->program_name_en}}
    @else
        {{$program->program_name_ar}}
    @endif
@endsection

@section('content')
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title"> @if(getlang() =='en')
                            {{$program->program_name_en}}
                        @else
                            {{$program->program_name_ar}}
                        @endif</h2>
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

    <section class="member-details mt-150 rmt-125">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="member-porfile mr-50 rmr-0 rmb-50">
                        <div class="porfile-image mb-40">
                            <img src="/images/Programs_images/{{$program->image}}" alt="Team Member">
                            <div class="experience">
                                <h3>25+</h3>
                                <h6>Subscriber</h6>
                            </div>
                        </div>
                        <div class="download-bio">
                            <a href="#"><i class="far fa-file-word"></i>{{trans('hanadi.BUY_NOW')}}</a>
                        </div>
                    </div>
                </div>
                @if(getlang() =='en')
                <div class="col-lg-7">
                    <div class="profile-details">
                        <h3 class="profile-name">{{$program->program_name_en}}</h3>
                        <p>{{$program->about_program_en}}</p>
                    </div>
                </div>
            </div>
            @else
                <div class="col-lg-7">
                    <div class="profile-details">
                        <h3 class="profile-name">{{$program->program_name_ar}}</h3>
                        <p>{{$program->about_program_ar}}</p>
                    </div>
                </div>
                @endif
        </div>
        </div>
    </section>
    @if($program->videos->count() > 0)
    <section class="video-section pt-100  pb-150  rpt-95 ">
        <div class="container">

            <div class="section-title text-center mb-50">
                <h2>{{trans('hanadi.Explanatory_videos')}}</h2>
            </div>
            <div class="row align-items-center">
                @foreach($program->videos as $row)
                <div class="col-md-3">
                    <div class="video-frame">
                        <div class="video-container">
                            <iframe src="/images/Program_videos/{{$row->video}}" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <div class="comments">
        <div class="contact-form">
            <div class="container">
                <div class="contact-form-inner">
                    <div class="section-title text-center mb-95">
                        <h2>Leave your comment</h2>

                    </div>
                    <form action="POST">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="" required="" placeholder="Name Here">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" value="" required="" placeholder="Email Here">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-60">
                                    <textarea name="message" id="message" class="form-control" rows="4" required="" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="theme-btn style-two">Send Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div></div>


    @include('Fronted.Programs.homePrograms')


@endsection