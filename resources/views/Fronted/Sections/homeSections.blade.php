@php
$package=\App\Models\Sections::where('status',1)->get();
@endphp
<section class="services-section pt-100  rpt-95 ">
    <div class="container">
        <div class="section-title text-center mb-95">
            <h2>CHOOSE SECTION</h2>
            <p>Doctor of experience in cosmetic and dermatology</p>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-6"></div>
            @foreach($package as $row)
            <div class="col-lg-2 col-md-6">

                <div class="service-item ">
                    <a href="{{route('Sections.singleSection',$row->id)}}"><img src="/images/Sections/{{$row->icon}}"></a>
                    <h4><a href="{{route('Sections.singleSection',$row->id)}}">{{$row->name}}</a></h4>
                </div>
        </div>
            @endforeach


    </div>
    </div>

</section>
