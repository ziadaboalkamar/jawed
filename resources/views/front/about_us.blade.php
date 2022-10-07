@extends("front.layouts.front")
@section("title","جمعية جود | من نحن")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")

@isset($about_us)

    <!-- about us section -->
    <section class="about_us mt-5 pt-5" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                    <h3 class="about_us_details" data-aos="fade-up">تعرف علي الجمعية</h3>
                    <p class="desc_one_of_about" data-aos="fade-up">
                        {{$about_us->description}}
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-righ">
                    <div class="img_div_about" data-aos="fade-down">
                        <img src="{{asset("storage/".$about_us->image)}}" class="img-fluid" width="100%" height="auto" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us section end -->
    <!-- whatwe see start -->
    <section class="what_we_see mt-5 pt-5" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-right" data-aos="fade-down">
                    <h3 class="what_we_see_title">رؤية الجمعية</h3>

                    <p class="paragraph_what_we_see">   {{$about_us->vision}}</p>
                </div>

                <div class="col-md-6 text-right" data-aos="fade-up">

                    <h3 class="what_we_see_title" >الرسالة</h3>

                    <p class="paragraph_what_we_see">   {{$about_us->message}}</p>
                </div>
            </div>

        </div>
    </section>
    <!-- end what we see -->
    <!-- start target  -->
    <section class="target mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right" data-aos="fade-down">
                    <h3 class="what_we_see_title">الأهداف</h3>
                    <p class="paragraph_what_we_see">   {{$about_us->goals}}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end target -->

@endisset
    <!-- numbers_of_geted strt -->
    <section class="numbers_of_geted mt-5 pt-3" dir="rtl" data-aos="fade-up">
        <div class="container">
            <div class="row text-righ">
                @isset($statistics)
                    @foreach($statistics as $statistic)
                <div class="col pt-3 text-center">
                    <span class="numer_of_family">+{{$statistic->number}}</span><br><span class="title_of_number">{{$statistic->name}}</span>
                </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
@endsection

