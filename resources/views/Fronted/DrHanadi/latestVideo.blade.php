
<section class="video-section pt-100  pb-150  rpt-95 ">
    <div class="container">

        <div class="section-title text-center mb-50">
            <h2>{{trans('hanadi.LATEST_VIDEO')}}</h2>
            <p>{{trans('hanadi.Doctor_of_experience_in_cosmetic_and_dermatology')}}</p>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="video-frame">
                    <div class="video-container">
                        <iframe src="/images/DrHanadi_videos/{{dr()->latest_video}}" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>


