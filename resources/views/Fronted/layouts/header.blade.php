@php
$sections = App\Models\Sections::where('status',1)->get();
@endphp
<header class="main-header">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container clearfix">

            <div class="header-inner d-lg-flex align-items-center">

                <div class="logo-outer d-flex align-items-center">
                    <div class="logo"><a href="/"><img src="/Fronted/images/logo.png" alt="" title=""></a></div>
                </div>

                <div class="nav-outer clearfix ml-lg-auto">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header clearfix">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li @if(isset($current) AND $current ==1) class="current" @endif><a href="/">{{trans('main.home')}}</a></li>
                                <li @if(isset($current) AND $current ==2) class="current" @endif><a href="{{route('General.about_dr')}}">{{trans('hanadi.About')}}</a></li>
                                <li class="dropdown"><a href="#">{{trans('hanadi.Treatments_Programs')}}</a>
                                    <ul>
                                        @foreach($sections as $row)
                                            @if(getLang() =='en')
                                        <li><a href="{{route('Sections.singleSection',$row->id)}}">{{$row->name_en}}</a></li>
                                           @else
                                       <li><a href="{{route('Sections.singleSection',$row->id)}}">{{$row->name_ar}}</a></li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </li>
                                <li @if(isset($current) AND $current ==3) class="current" @endif><a href="{{route('General.contacts')}}">{{trans('hanadi.Contact')}}</a></li>
                                @if(Auth::check())
                                <li><a href="{{route('user.profile')}}">{{getLang() =='ar' ? '??????????' : 'my profile'}}</a></li>
                                @else
                                    <li @if(isset($current) AND $current ==4) class="current" @endif><a href="{{route('User.sign_in')}}"><i class="far fa-user"></i>{{trans('hanadi.login')}}</a></li>
                                    <li @if(isset($current) AND $current ==5) class="current" @endif><a href="{{route('User.sign_up')}}"><i class="far fa-user"></i>{{trans('hanadi.sign_up')}}</a></li>
                                @endif
                                @if(getLang() =='en')
                                    <li><a style="color: red" href="{{ LaravelLocalization::getLocalizedUrl('ar') }}">??????????????</a></li>
                                @else
                                    <li><a style="color: red"  href="{{ LaravelLocalization::getLocalizedUrl('en') }}">English</a></li>
                                @endif

                            </ul>
{{--                            <div class="dropdown">--}}
{{--                                <button type="button" class="btn btn-info" data-toggle="dropdown">--}}
{{--                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">3</span>--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu">--}}
{{--                                    <div class="row total-header-section">--}}
{{--                                        <div class="col-lg-6 col-sm-6 col-6">--}}
{{--                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">3</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">--}}
{{--                                            <p>Total: <span class="text-info">$2,978.24</span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row cart-detail">--}}
{{--                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                            <img src="https://images-na.ssl-images-amazon.com/images/I/811OyrCd5hL._SX425_.jpg">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                            <p>Sony DSC-RX100M..</p>--}}
{{--                                            <span class="price text-info"> $250.22</span> <span class="count"> Quantity:01</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row cart-detail">--}}
{{--                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                            <img src="https://cdn2.gsmarena.com/vv/pics/blu/blu-vivo-48-1.jpg">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                            <p>Vivo DSC-RX100M..</p>--}}
{{--                                            <span class="price text-info"> $500.40</span> <span class="count"> Quantity:01</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row cart-detail">--}}
{{--                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                            <img src="https://static.toiimg.com/thumb/msid-55980052,width-640,resizemode-4/55980052.jpg">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                            <p>Lenovo DSC-RX100M..</p>--}}
{{--                                            <span class="price text-info"> $445.78</span> <span class="count"> Quantity:01</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">--}}
{{--                                            <button class="btn btn-primary btn-block">Checkout</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                    </nav>
                    <!-- Main Menu End-->
                </div>
            </div>

        </div>
    </div>
    <!--End Header Upper-->

</header>
