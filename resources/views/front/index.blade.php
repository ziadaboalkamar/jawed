@extends("front.layouts.front")
@section("title","جمعية جود | الرئيسية")
@section("slider")
    @if(count($sliders) > 0)
    <div class="hero_index"  style="">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @isset($sliders)
                    @foreach($sliders as $key => $slider)
                <div class="swiper-slide" style="background-image: url({{ asset('storage/'.$slider->image) }});">
                    <div id="overlay"></div>
                    <div class="container content_container">
                        <div class="content text-right">
                            <h1 data-aos="fade-left">{{ $slider->title }}</h1>
                            <p data-aos="fade-left">{{Str::limit($slider->description, 300)  }}</p>
{{--                            <a class="button_of_hero btn btn-primary" role="button" data-aos="fade-left" target="_blank" href="{{ $slider->link }}">تعرف اكثر</a>--}}
                        </div>
                    </div>
                </div>
                    @endforeach
                @endisset
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @else
        <div class="hero_index hero_index_for_sub_pages">

        </div>
    @endif
@endsection
@section("content")
    <!-- section types_of_teath -->
    @if($about_us)
    <section class="types_of_teath new_of_teath about_us pt-5" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4 text-center news_main_title " data-aos="fade-up">
                    <div class="news_main_title text-center">
                        <h4 class="subtitle_of_news pb-3">عن الجمعية</h4>
                        <h3 class="main_title_of_news pb-3">جمعية جود النسائية لخدمات القطاع الغير الربحي</h3>
                    </div>

                </div>

                <div class="col-lg-6 col-md-6 text-right "  data-aos="fade-down">
                    <h2 class="main_title_of_type">من نحن</h2>

                    <p class="desc_of_type pt-3">{{Str::limit($about_us->description,500)}}</p>
                    <a class="btn btn-primary blog_more" href="{{route('view.aboutus.aboutUs')}}" role="button">تعرف علينا اكثر </a>

                </div>
                <div class="col-lg-6 col-md-6 image_of_waha_collaps " data-aos="fade-up">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{1}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>

            </div>
        </div>
    </section>
    <!-- end section types_of_teath -->
    @endif
    <!-- section program & project -->
    <section class="program_and_project" dir="rtl">


        <div class="row">
            <div class="col-lg-12 background_of_program_and_project" style="background-image: linear-gradient(90deg, rgba(134,189,141,0.8407738095238095) 0%, rgba(44,93,113,0.8379726890756303) 100%), url(images/shutterstock_431109490-1-1200x800.png);" >

                <div class="row text-right">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="row">
                                <div class="col pb-5 title_of_program">
                                    <h4>خدمات الجمعية</h4>
                                    <h3>تسعى الجمعية لتوفير افضل الخدمات </h3>
                                </div>
                                <div class="col pb-5 desc_of_program">
                                    <p>
                                        @if($about_us)
                                        {{Str::limit($about_us->description,200)}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card_of_program">
                            <div class="col-lg-12">
                                <div class="row">
                                    @isset($services)
                                        @foreach($services as $service)
                                    <div class="col-lg-3">
                                        <div class="card hvr-bob">
                                            <div class="card-body">
                                                <div class="image_of_card_of_program pt-3 pb-3">
                                                    <img src="{{ asset('storage/'.$service->image) }}" width="50px" class="img-fluid" alt="">
                                                    <h4 class="pt-4 pb-2 card_title">{{$service->name}}</h4>
                                                    <p>
{{--                                                        {{$service->description}}--}}
                                                        {{Str::limit($service->description,200)}}
                                                    </p>
                                                    <a href="{{route("view.aboutus.aboutUs")}}" class="more_of_read_more"> اكتشف المزيد <i class="fa-solid fa-arrow-left-long"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endisset

                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>

        </div>
    </section>
    <!-- end section program and project -->

    <!-- section news of  teath -->
    @if($blogs)

    <section class="new_of_teath " dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center news_main_title " data-aos="fade-up">
                    <div class="news_main_title text-center">
                        <h3 class="main_title_of_news pb-3"> آخر أخبار الجمعية</h3>


                    </div>

                </div>
                @isset($blogs)
                    @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6"  data-aos="fade-down">
                    <div class="blog__item hvr-grow">
                        <div class="blog__item__pic set-bg"  data-setbg=>
                            <img src="{{ asset('storage/'.$blog->main_image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="blog__item__text text-right">
                            <h5 class="text-right main_title_of_news">{{ $blog->title }}</h5>
                            <p class="desc_of_news_blog">{!!Str::limit($blog->short_description,100) !!}</p>
                            <a href="{{route("view.news.show",$blog->id)}}" class="more_news btn btn-primary">اقرا المزيد</a>

                        </div>
                    </div>
                </div>
                    @endforeach
                @endisset

                <div class="col-md-12 text-center" data-aos="fade-up">
                    <a href="{{route("view.Initiative.index")}}" class="blog_more btn btn-primary">عرض المزيد</a>

                </div>
            </div>
        </div>
    </section>
    <!-- end section of teath -->
    @endif
    <!-- section types_of_teath -->
    <section class="types_of_teath pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center "  data-aos="fade-down">
                    <h2 class="main_title_of_type">الاسئلة الشائعة</h2>
{{--                    <p class="desc_of_type pt-3">--}}
{{--                        @if($about_us)--}}
{{--                            {{Str::limit($about_us->description,200)}}--}}
{{--                        @endif</p>--}}
                    <hr>

                    <ul class="content_of_type_teath mt-5" dir="rtl">
@isset($faqs)
    @foreach($faqs as $key => $faq)
                        <li data-toggle="collapse" href="#collapseExample{{$key}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$key}}" class="d-block">
                            <i class="fa-solid fa-circle-chevron-left"></i> <span>{{$faq->question}}</span>
                            <div class="collapse" id="collapseExample{{$key}}">
                                <div class="card card-body">
                                    {{$faq->description}}
                                        </div>
                            </div>
                        </li>

                        <hr>
                            @endforeach
                        @endisset


                    </ul>


                </div>
{{--                <div class="col-lg-6 col-md-6 image_of_waha_collaps " data-aos="fade-up">--}}

{{--                    <div class="image_of_type">--}}
{{--                        <img src="{{asset("front/images/Mask Group 6.png")}}" width="100%" alt="">--}}
{{--                        <div class="book_mark_waha">--}}
{{--                            <a href="">--}}
{{--                                <img src="{{asset("front/images/icons8-bookmark-128.png")}}" width="55px" class="img-fluid" alt="">--}}
{{--                                <h5>--}}
{{--                                    دليل تقديم--}}
{{--                                    دعم المستخدمين</h5>--}}
{{--                            </a>--}}
{{--                        </div>--}}



{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </section>
    <!-- end section types_of_teath -->

    <!-- section client says -->
    <section class="client_what_says home_client">
        <div id="overlay"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right" data-aos="fade-down">
                    <div class="massege_of_client">
                        <h2 class="main_message_of_client">اخر التغريدات</h2>

                    </div>

                </div>
                <div class="col-lg-12 text-right" data-aos="fade-up">
                    <div class="comment_carousal owl-carousel owl-theme">
                        @isset($clientOpiniones)
                            @foreach($clientOpiniones as $client)
                        <div class="item">
                            <div class="row">

                                <div class="col-lg-11 paragraph_of_client text-right ">
                                    <p>{{$client->message}} </p>

                                </div>
                                <div class="col-lg-1 icon_of_qouta">
                                    <i class="fa-solid fa-quote-right"></i>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="what_says_in_comment">

                                        <li><span class="name_of_user">{{$client->name}}</span><br> <span>عملاء نفتخر بهم</span></li>
                                        <li><img src="{{ asset('storage/'.$client->image) }}" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endisset

                    </div>
                </div>
{{--                <div class="col-lg-12"data-aos="fade-down" dir="rtl" >--}}
{{--                    <div class="row">--}}
{{--                        @isset($statistics)--}}
{{--                            @foreach($statistics as $statistics)--}}
{{--                        <div class="col-lg-3 col-md-4 col-sm-12">--}}
{{--                            <div class="card text-right" style="width: 100%;">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">--}}
{{--                                        <span  class="number_in_card" dir="rtl">+{{$statistics->number}}</span>--}}
{{--                                    </h5>--}}
{{--                                    <h6 class="title_of_card">{{$statistics->name}}</h6>--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- section client says -->
    <!-- start partners   -->
    <section class="partners" data-aos="fade-up"
             data-aos-anchor-placement="top-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center pt-5 p-5">شركاء النجاح</h2>
                </div>
                <div class="col-md-12">
                    <div class=" partners_carousel owl-carousel owl-theme">
                        @isset($partners)
                            @foreach($partners as $partner)
                        <div class="item">
                            <div class="card bg-white rounded mb-5" style="width: 100%;">
                                <div class="card-body">
                                    <img width="100%" src="{{ asset('storage/'.$partner->image) }}" alt="">
                                </div>
                            </div>

                        </div>
                            @endforeach
                        @endisset
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end partners -->
    <!-- start magazine -->
    <section class="magazine mt-5" data-aos="fade-up"
             data-aos-anchor-placement="bottom-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5>نسعد بانضمامك إلى عضوية جوّد</h5>
                </div>
                <div class="col-md-12 text-center mt-5">

                    <a class="btn btn-primary  btn-outline-more" href="{{route("view.membership.description")}}" role="button">طلب عضوية</a>

                </div>
            </div>
        </div>
    </section>
    <!-- end magazine -->

@endsection
@section("js")
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <script>

        $('.comment_carousal').owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            dots: false,
            nav: true,
            smartSpeed: 1200,
            autoHeight: false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });


        $('.partners_carousel').owlCarousel({
            loop: true,
            margin: 10,
            items: 4,
            dots: true,
            smartSpeed: 1200,
            autoHeight: false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,

                },
                600:{
                    items:3,

                },
                1000:{
                    items:4,

                }
            }
        })
    </script>
@endsection
