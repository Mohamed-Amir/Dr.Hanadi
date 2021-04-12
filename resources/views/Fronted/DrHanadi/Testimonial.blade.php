@php
    $Testimonial=\App\Models\Testimonial::where('status',1)->get();
@endphp
<section class="testimonial-section bg-three py-135 rpy-100 rmb-100">
    <div class="container">
        <div class="testimonial-wrap owl-carousel">
            @foreach($Testimonial as $row)
            <div class="testimonial-item">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="testimonial-image">
                            <img src="/images/Testimonial/{{$row->image}}" alt="Testimonial">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="testimonial-content">
                            <p>{{$row->testimonial}}</p>
                            <h4>{{$row->name}}</h4>
                            <span>{{$row->title}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="testimonial-dotted">
        <img src="/Fronted/images/testimonials/testimonial-dotted.png" alt="dotted">
    </div>

    <div class="testimonial-quote">
        <img src="/Fronted/images/testimonials/quote.png" alt="angle">
    </div>
</section>


