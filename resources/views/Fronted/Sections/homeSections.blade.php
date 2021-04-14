@php
$package=\App\Models\Sections::where('status',1)->get();
@endphp
<section class="services-section pt-100  rpt-95 ">
    <div class="container">
        <div class="section-title text-center mb-95">
            <h2>{{trans('hanadi.CHOOSE_SECTION')}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-6"></div>
            @foreach($package as $row)
                @if(getLang() =='en')
            <div class="col-lg-2 col-md-6">
                <div class="service-item ">
                    <a href="{{route('Sections.singleSection',$row->id)}}"><img src="/images/Sections/{{$row->icon}}"></a>
                    <h4><a href="{{route('Sections.singleSection',$row->id)}}">{{$row->name_en}}</a></h4>
                </div>
            </div>
                @else
                    <div class="col-lg-2 col-md-6">
                        <div class="service-item ">
                            <a href="{{route('Sections.singleSection',$row->id)}}"><img src="/images/Sections/{{$row->icon}}"></a>
                            <h4><a href="{{route('Sections.singleSection',$row->id)}}">{{$row->name_ar}}</a></h4>
                        </div>
                    </div>
                @endif
            @endforeach


    </div>
    </div>

</section>
