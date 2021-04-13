@php
$service = App\Models\Sections::get();
@endphp
<footer class="footer-section pt-150 rpt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget about-widget mr-30 rmr-0">
                            <h4 class="footer-title">About Us.</h4>
                            <div class="about-widget-content">
                                <p>{{about()->about_us_en}}</p>
                                <div class="about-widget-contact mt-25">
                                    <p>{{about()->address}}</p>
                                    <h4>{{about()->phone1}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="widget services-widget">
                            <h4 class="footer-title">Our Services.</h4>
                            <ul class="list-style-one">
                                @foreach($service as $row)
                                <li><a href="{{route('Sections.singleSection',$row->id)}}">{{$row->name}}</a></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="widget subscribe-widget">
                    <h4 class="footer-title">Subscribe Now.</h4>
                    <form id="NewsForm" method="post">
                        @csrf
                        <input name="email" type="email" placeholder="Your email here" required>
                        <div class="btn-and-text">
                            <button id="save" type="submit"><i class="flaticon-right-arrow-1"></i></button>
                            <p>Receive weekly tips & tricks on beauty.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Area-->
    <div class="copyright mt-100 rmt-50">
        <div class="container">
            <div class="copyright-inner">
                <p>Copyright@2021 HANADI YOUSIF. All rights reserved</p>
                <!-- Scroll Top Button -->
                <button class="scroll-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></button>
            </div>
        </div>
    </div>

    <div class="footer-dotted-top">
        <img src="/Fronted/images/footer/footer-dot1.png" alt="Footer Dotted">
    </div>
    <div class="footer-dotted-bottom">
        <img src="/Fronted/images/footer/footer-dot2.png" alt="Footer Dotted">
    </div>
</footer>
