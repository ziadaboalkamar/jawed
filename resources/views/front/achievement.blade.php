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
                    <h2 class="text-center pt-5 p-5">انجازات الجمعية</h2>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-12 desc_of_blog_content text-right pt-5 pb-5">
                                           {!! $achievement->data !!}

                                                 </div>


                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>




                </div>

            </div>
        </div>
    </section>
    <!-- end blog of content -->
@endsection

