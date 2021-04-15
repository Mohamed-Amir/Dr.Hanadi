@extends('Fronted.layouts.master')

@section('title')
    {{trans('hanadi.my_profile')}}
@endsection

@section('content')
    <!--====================================================================
           Start Banner Section
       =====================================================================-->
    <section class="banner-section">
        <div class="container">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2 class="page-title">login</h2>
                    <p>Saunas are used all over the world to improve health to enjoy <br>and relax electronic
                        typesetting.</p>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{trans('hanadi.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('hanadi.my_profile')}}</li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>
    <!--====================================================================
       End Banner Section
   =====================================================================-->

    <section class=" pt-150 rpt-100">
        <!-- partial -->
        <div class="main-panel">
            <div class="container">


                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="profile-card">

                                <div class="profile-header">


                                    <div class="user-image">
                                        <img src="/Fronted/assets/images/about/about2.png" class="img ">
                                    </div>
                                </div>

                           @include('Fronted.User.links')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title font-weight-bold">About</p>
                                <hr>
                                <p class="card-description">User Information</p>
                                <ul class="about">
                                    <li class="about-items"><i class="mdi mdi-account icon-sm "></i><span
                                                class="about-item-name">Name:</span><span class="about-item-detail">Santosh Ghimire</span><a
                                                href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-mail-ru icon-sm "></i><span
                                                class="about-item-name">username:</span><span class="about-item-detail">santoshghimire</span>
                                        <a href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-lock-outline icon-sm "></i><span
                                                class="about-item-name">Password:</span><span class="about-item-detail">**********</span>
                                        <a href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-format-align-left icon-sm "></i><span
                                                class="about-item-name">Bio:</span><span class="about-item-detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto totam, nemo quidem delectus dolores vero porro inventore perferendis minus perspiciatis.</span>
                                        <a href="" class="about-item-edit">Edit</a></li>

                                    <li class="about-items"><i class="mdi mdi-trophy-variant-outline icon-sm "></i><span
                                                class="about-item-name">Badges:</span><span class="about-item-detail">
                       <button type="button" class="btn btn-success btn-rounded btn-icon">
                        <i class="mdi mdi-star text-white"></i>
                      </button>
                        <button type="button" class="btn btn-info btn-rounded btn-icon">
                        <i class="mdi mdi-check text-white"></i>
                      </button>
                       <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <i class="mdi mdi-check text-white"></i>
                      </button>
                      </span> <a href="" class="about-item-edit">View</a></li>

                                </ul>
                                <p class="card-description">Contact Information</p>
                                <ul class="about">
                                    <li class="about-items"><i class="mdi mdi-phone icon-sm "></i><span
                                                class="about-item-name">Phone:</span><span class="about-item-detail">+9779861106179</span><a
                                                href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-map-marker icon-sm "></i><span
                                                class="about-item-name">Address:</span><span class="about-item-detail">254 National Highway , Hisar India</span>
                                        <a href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-email-outline icon-sm "></i><span
                                                class="about-item-name">Email:</span><span class="about-item-detail"><a
                                                    href="">reasonghimire706@gmail.com</a></span> <a href=""
                                                                                                     class="about-item-edit">Edit</a>
                                    </li>
                                    <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span
                                                class="about-item-name">Site:</span><span class="about-item-detail"><a
                                                    href="google.com">www.google.com</a></span> <a href=""
                                                                                                   class="about-item-edit">Edit</a>
                                    </li>
                                </ul>
                                <p class="card-description">Basic Information</p>
                                <ul class="about">
                                    <li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span
                                                class="about-item-name">Birthday:</span><span class="about-item-detail">Aug 3 , 1998</span><a
                                                href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-account icon-sm "></i><span
                                                class="about-item-name">Gender:</span><span class="about-item-detail">Male</span>
                                        <a href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-clipboard-account icon-sm "></i><span
                                                class="about-item-name">Profession:</span><span
                                                class="about-item-detail">Student</span> <a href=""
                                                                                            class="about-item-edit">Edit</a>
                                    </li>
                                    <li class="about-items"><i class="mdi mdi-water icon-sm "></i><span
                                                class="about-item-name">Blood Group:</span><span
                                                class="about-item-detail">AB+</span> <a href="" class="about-item-edit">Edit</a>
                                    </li>
                                    <li class="about-items"><i class="mdi mdi-human-male-female icon-sm "></i><span
                                                class="about-item-name">Relationship Status:</span><span
                                                class="about-item-detail">Single</span> <a href=""
                                                                                           class="about-item-edit">Edit</a>
                                    </li>
                                </ul>


                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </section>
@endsection