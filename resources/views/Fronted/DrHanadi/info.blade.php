<section class="about-section my-150 rmt-125 rmb-100">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-8">
                <div class="about-content">
                    <div class="section-title">
                        <h2>{{trans('hanadi.About_the_life_of_Dr_Hanadi')}}</h2>
                        <p>{{getLang() =='ar' ?  dr()->about_ar : dr()->about}}</p>
                    </div>





                </div>
            </div>

            <div class="col-lg-4">
                <div class="about-images rmb-50">
                    <img src="/images/DrHanadi_images/{{dr()->image}}" alt="about image">
                </div>
            </div>
        </div>
    </div>
</section>