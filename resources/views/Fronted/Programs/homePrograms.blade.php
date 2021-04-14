@php
    $program=\App\Models\Programs::where('status',1)->get();
@endphp
<section class="team-section @if(isset($singleProgram)) pt-95 pb-150 rpt-70 rpb-100 @endif">
    @if(!isset($singleProgram))
    <div class="section-title text-center mb-50">
        <h2>Treatments Programs</h2>
        <p>It has different attractions tropical rain fog dew wall jets and it is <br> combined with sound, caribbian storm.</p>
    </div>
    @endif


    <div class="container">
        <div class="team-carousel owl-carousel">
           @foreach($program as $row)
               @if(getlang() =='en')
            <div class="team-item">
                <img src="/images/Programs_images/{{$row->image}}" alt="Team Member">
                <h5>{{$row->program_name_en}}</h5>
                <a href="{{route('Programs.singlePrograms',$row->id)}}">{{trans('hanadi.MORE_DETAILS')}}</a>
            </div>
                @else
                    <div class="team-item">
                        <img src="/images/Programs_images/{{$row->image}}" alt="Team Member">
                        <h5>{{$row->program_name_ar}}</h5>
                        <a href="{{route('Programs.singlePrograms',$row->id)}}">{{trans('hanadi.MORE_DETAILS')}}</a>
                    </div>
                @endif
            @endforeach

        </div>

    </div>
</section>
