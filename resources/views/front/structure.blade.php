@extends("front.layouts.front")
@section("title","جمعية جود | الهيكل التنظيمي")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- section of blog content -->
    <section class="blog_content news_about_your_projerct" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12 title_design">
                    <h2 class="text-center pt-5 p-5">الهيكل التنظيمي</h2>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-12 desc_of_blog_content text-right pt-5 pb-5">
                                            @isset($structure->data)
                                           {!! $structure->data !!}
                                            @endisset
                                                 </div>


                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>




                </div>
                <!-- section albums -->
                <div class="col-lg-12">
                    <section class="albums_of_photo">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 title_design">
                                    <h2 class="text-center pt-5 p-5">أعضاء مجلس الإدارة</h2>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card" style="width: 100%;">
                                        <div class="image-of-news"><img src="images/1 (1).png" class="card-img-top hvr-grow"
                                                                        alt="..."></div>

                                        <div class="card-body">
                                            <h3 class="card-text card-paragraph text-center pt-3">
                                                اسم الاداري يكتب هنا</h3>
                                            <p class="card-text text-center"><small class="text-muted">مجلس الادارة</small></p>



                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </section>
                </div>

                <!-- end section albums -->
                <!-- section albums -->
                <div class="col-lg-12">
                    <section class="albums_of_photo">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 title_design">
                                    <h2 class="text-center pt-5 p-5">أعضاء الجمعية العمومية</h2>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card" style="width: 100%;">
                                        <div class="image-of-news"><img src="{{asset("front/images/1 (1).png")}}" class="card-img-top hvr-grow"
                                                                        alt="..."></div>

                                        <div class="card-body">
                                            <h3 class="card-text card-paragraph text-center pt-3">
                                                اسم الاداري يكتب هنا</h3>
                                            <p class="card-text text-center"><small class="text-muted">مجلس الادارة</small></p>



                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </section>
                </div>

                <!-- end section albums -->

            </div>
        </div>
    </section>
    <!-- end blog of content -->
@endsection

