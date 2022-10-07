@extends("front.layouts.front")
@section("title","جمعية جود | مبادرات الجمعية")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- search_box start -->
    <section class="search_side" dir="rtl" >

        <div class="s130 row">
            <div class="col-md-12 title_design">
                <h2 class="text-center pt-5 p-5">مبادرات جمعية جود</h2>
            </div>

            <div class="col-md-9 search_box">
                <form action="{{route("view.Initiative.search")}}" method="post">
                    @csrf
                    <div class="inner-form">
                        <div class="input-field first-wrap">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                     height="24" viewBox="0 0 24 24">
                                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16
                                9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5
                                16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49
                                19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14
                                7.01 14 9.5 11.99 14 9.5 14z"></path>
                                </svg>
                            </div>
                            <input id="search" name="search" type="text" placeholder="اكتب كلمات من عنوان الخبر للبحث" />
                        </div>
                        <div class="input-field second-wrap">
                            <button  class="btn-search" type="submit">بحث</button>
                        </div>
                    </div>

                </form></div>



        </div>
    </section>
    <!-- search_box end -->
    <!-- section news of  teath -->
    <section class="new_of_teath new_without_bg" dir="rtl">
        <div class="container">
            <div class="row">
            @isset($news)
                @foreach($news as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6"  data-aos="fade-down">
                    <div class="blog__item hvr-grow">
                        <div class="blog__item__pic set-bg"  data-setbg="{{asset("storage/".$blog->image)}}">
                        </div>
                        <div class="blog__item__text text-right">
                            <h5 class="text-right main_title_of_news">{{$blog->title}}</h5>
                            <p class="desc_of_news_blog">{!!Str::limit($blog->description,100) !!}</p>
                            <a href="{{route("view.Initiative.show",$blog->id)}}" class="more_news btn btn-primary">اقرا المزيد</a>
                        </div>
                    </div>
                </div>
                    @endforeach
                        @endisset
            </div>
        </div>
    </section>
    <!-- end section of teath -->
@endsection

