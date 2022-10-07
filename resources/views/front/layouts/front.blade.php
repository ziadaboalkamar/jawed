<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield("title")</title>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("front/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("front/css/style.css")}}?<?php echo time();?>">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    @isset(\App\Models\Websit::first()->favicon_image)
      <link rel="icon" type="image/x-icon" href="{{"storage/".\App\Models\Websit::first()->favicon_image ?? " "}}">
@endisset
    <link rel="stylesheet" href="{{asset("front/fonts/icomoon/style.css")}}">
    <link rel="stylesheet" href="{{asset("front/css/hover.css")}}">
    <link rel="stylesheet" href="{{asset("front/vendor/aos/aos.min.css")}}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset("front/css/swiper.css")}}">
    <link rel="stylesheet" href="{{asset("front/css/owl.carousel.css")}}">
    <link rel="stylesheet" href="{{asset("front/css/owl.css")}}">
@yield("css")
    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .site-navbar .site-navigation .site-menu .logout-class > a:after {
            display: none;
        }
    </style>
</head>
@php
$setting = \App\Models\Websit::first();
@endphp
<body class="gray_body" >
<!--start nav bar  -->
<section class="nav " dir="rtl">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap">
        <div class="site-navbar-top">
            <div class="container pb-3 pt-2">
                <div class="row align-items-center">

                    <div class="col-12 text-left">
                        <div>
                            <div class="mr-auto social-icon">
                    @isset($setting->twitter)
                        <a href="{{$setting->twitter}}" ><span class="icon-twitter"></span></a>
                        @endisset
                            @isset($setting->facebook)
                                <a href="{{$setting->facebook}}"><span class="icon-facebook"></span></a>
                            @endisset
                            @isset($setting->youtube)
                                <a href="{{$setting->youtube}}"><span class="icon-youtube"></span></a>
                            @endisset
                            @isset($setting->instagram)
                                <a href="{{$setting->instagram}}"><span class="icon-instagram"></span></a>
                            @endisset
                            @isset($setting->whatsapp)
                                <a href="{{$setting->whatsapp}}" ><span class="icon-whatsapp"></span></a>
                            @endisset
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="site-navbar site-navbar-target js-sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-2 text-left">
                        <h1 class="my-0 site-logo"><a href="{{route("view.index")}}"><img
                                    src="{{asset("front/images/logo.png")}}" width="100%" alt=""></a></h1>
                    </div>
                    <div class="col-1">

                        <h1 class="my-0 site-logo"><a href="{{route("view.index")}}"><img
                                    src="{{asset("front/images/Saudi_Vision_2030_logo.svg.png")}}" width="100px" alt=""></a></h1>
                    </div>
                    <div class="col-9">
                        <nav class="site-navigation text-left"role="navigation">

                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3
                      float-left"><a href="#" class="site-menu-toggle
                        js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                            <ul class="site-menu text-left t main-menu js-clone-nav d-none
                      d-lg-block">
                                <li class="active"><a href="{{route("view.index")}}"
                                                      class="nav-link">الرئيسية</a></li>

                                <li class="has-children">
                                    <a href="#" class="nav-link">عن الجمعية</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{route("view.aboutus.aboutUs")}}" class="nav-link">من نحن</a></li>
                                        <li><a href="{{route("view.structure")}}" class="nav-link">الهيكل التنظيمي</a></li>
                                        <li><a href="{{route("view.policies")}}" class="nav-link">اللوائح و السياسات</a></li>
                                        <li><a href="{{route("view.achievement")}}" class="nav-link">أنجازات الجمعية</a></li>
                                        <li><a href="{{route("view.partner")}}" class="nav-link">شركاء النجاح</a></li>


                                    </ul>
                                </li>
                                <li><a href="{{route("view.Initiative.index")}}" class="nav-link">مبادرات جود</a></li>

                                <li class="has-children">
                                    <a href="#" class="nav-link">خدمات الجمعية</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{route("view.courses.index")}}" class="nav-link">دورات التدريبية</a></li>
                                        <li><a href="{{route("view.diploma.index")}}" class="nav-link">الدبلومات المهنية</a></li>
                                        <li><a href="{{ route('view.consultation.index') }}" class="nav-link">الاستشارات</a></li>
                                        <li><a href="{{ route('view.membership.description') }}" class="nav-link">العضويات</a></li>
                                        <li><a href="{{ route('view.volunteer.index') }}" class="nav-link">التطوع</a></li>
                                        <li><a href="" class="nav-link">تقييم رضى المستفيد</a></li>
                                        <li><a href="" class="nav-link">تقييم رضى الأعضاء</a></li>


                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#" class="nav-link">مركز المعرفة</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{route("view.library")}}" class="nav-link">المكتبة</a></li>


                                    </ul>
                                </li>

                                <li class="has-children">
                                    <a href="#" class="nav-link">مركز الاعلامي</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{route("view.news.index")}}" class="nav-link">الاخبار</a></li>
                                        <li><a href="{{route("view.reports")}}" class="nav-link">التقارير السنوية</a></li>
                                        <li><a href="{{route("view.album.index")}}" class="nav-link">صور</a></li>


                                    </ul>
                                </li>

                                <li><a href="{{route("view.ecommerce.index")}}" class="nav-link">متجر الالكتروني</a></li>

                                <li><a href="{{ route('view.contact.index') }}" class="nav-link">   تواصل معنا</a></li>

                                @if(Auth::check())
                                <li class="has-children logout-class">
                                    <a href="#" class="nav-link"><button class="btn btn-outline-more ">{{ Auth::user()->user_name }}</button></a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('view.client.dashboard') }}" class="nav-link">صفحة المستخدم</a></li>
                                        <li><a href="#"  onclick="document.getElementById('clientlogout').submit()" class="nav-link">تسجيل الخروج</a></li>
                                        <form action="{{ route('logout') }}" method="post" class="d-none" id="clientlogout">
                                            @csrf
                                            <button type="submit"></button>
                                        </form>
                                    </ul>
                                </li>
                                @else
                                    <li><a href="{{ route('login') }}" class="nav-link"><button class="btn btn-outline-more ">تسجيل دخول</button></a></li>
                                @endif
                            </ul>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield("slider")
    </div>

</section>

<!-- end nav bar -->

@yield("content")


<!-- end magazine -->

<!-- FOOTER START -->
<footer class="footer" dir="rtl">
    <div class="container">
        <div class="row pt-5 pb-2">
            <div class="col-md-4 footer-logo">
                <img src="{{asset("front/images/logo.png")}}" width="278px"
                     alt="">
                <div style="display: inline-grid;">
                    <div class="mr-auto social-icon">
                        @isset($setting->twitter)
                        <a href="{{$setting->twitter}}" ><span class="icon-twitter"></span></a>
                        @endisset
                            @isset($setting->facebook)
                                <a href="{{$setting->facebook}}"><span class="icon-facebook"></span></a>
                            @endisset
                            @isset($setting->youtube)
                                <a href="{{$setting->youtube}}"><span class="icon-youtube"></span></a>
                            @endisset
                            @isset($setting->instagram)
                                <a href="{{$setting->instagram}}"><span class="icon-instagram"></span></a>
                            @endisset
                            @isset($setting->whatsapp)
                                <a href="{{$setting->whatsapp}}" ><span class="icon-whatsapp"></span></a>
                            @endisset
                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-right title_of_category_footer">القائمة الرئيسية</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="text-right list_of_footer">
                            <li class=""><i class="fa-solid fa-angle-left"></i> <a href="{{route("view.index")}}">الرئيسية</a>
                            </li>
                            <li><i class="fa-solid fa-angle-left"></i> <a href="{{route("view.courses.index")}}">دورات التدريبية
                                    </a></li>
                            <li><i class="fa-solid fa-angle-left"></i> <a href="{{route("view.diploma.index")}}">الدبلومات المهنية
                                    </a></li>
                            <li><i class="fa-solid fa-angle-left"></i> <a href="{{route("view.consultation.index")}}">الاستشارات
                                    </a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-right list_of_footer">
                            <li> <i class="fa-solid fa-angle-left"></i><a href="{{route("view.library")}}">المكتبة</a>
                            </li>
                            <li> <i class="fa-solid fa-angle-left"></i><a href="{{route("view.news.index")}}">الاخبار
                                    </a></li>
                            <li><i class="fa-solid fa-angle-left"></i> <a href="{{route("view.contact.index")}}">   تواصل معنا
                                    </a></li>
                            <li><i class="fa-solid fa-angle-left"></i> <a href="{{route("view.ecommerce.index")}}">متجر الالكتروني
                                    </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-right title_of_category_footer">بيانات التواصل</h4>
                <div>
                    <ul class="text-right">
                        @isset($setting->phone)
                        <li><img src="{{asset("front/images/icons8-android-64.png")}}" alt=""><a href="tel:{{$setting->phone}}">{{$setting->phone}}</a> </li>
                        @endisset
                        @isset($setting->telephone_number)
                        <li><img src="{{asset("front/images/icons8-android-64.png")}}" alt=""><a href="tel:{{$setting->telephone_number}}">{{$setting->telephone_number}}</a> </li>
                            @endisset
                            @isset($setting->email)
                        <li><img src="{{asset("front/images/icons8-email-64-(1).png")}}" alt=""><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></li>
                            @endisset

                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<!-- END OF FOOTER -->
<!-- start copy right -->
<section class="copy_right">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h6> جمعية جود  جميع الحقوق محفوظة </h6>
            </div>
        </div>
    </div>
</section>
<!-- end copy right -->
<!-- Swiper JS -->
<script src="{{asset("front/js/swiper.js")}}"></script>
<script src="{{asset("front/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("front/js/popper.min.js")}}"></script>
<script src="{{asset("front/js/bootstrap.min.js")}}"></script>
<script src="{{asset("front/js/jquery.sticky.js")}}"></script>
<script src="{{asset("front/vendor/aos/aos.min.js")}}"></script>
<script src="{{asset("front/js/main.js")}}"></script>
<script src="{{asset("front/js/owl.carousel.min.js")}}"></script>
<!-- Initialize Swiper -->
@yield("js")
</body>
</html>
