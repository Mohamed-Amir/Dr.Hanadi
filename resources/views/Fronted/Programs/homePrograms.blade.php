@php
    $program=\App\Models\Programs::where('status',1)->get();
@endphp
<section class="team-section ">

    <div class="section-title text-center mb-50">
        <h2>Treatments Programs</h2>
        <p>It has different attractions tropical rain fog dew wall jets and it is <br> combined with sound, caribbian storm.</p>
    </div>


    <div class="container">
        <div class="team-carousel owl-carousel">
           @foreach($program as $row)
            <div class="team-item">
                <img src="/images/Programs_images/{{$row->image}}" alt="Team Member">
                <h5>{{$row->program_name}}</h5>
                <a href="Program.html">more info</a>
            </div>
            @endforeach

        </div>

    </div>
</section>
