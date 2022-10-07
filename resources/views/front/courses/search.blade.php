@extends("front.layouts.front")
@section("title","جمعية جود | البحث")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- section of news_about_your_projerct -->
    <section class="news_about_your_projerct" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12 title_design">
                    <h2 class="text-center pt-5 p-5">الدورات التدريبية</h2>
                </div>

                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card text-right">
                                <h5 class="card-header">البحث السريع</h5>
                                <div class="card-body text-center">
                                    <form action="{{route("view.courses.search")}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="search" name="search"  class=" search_input form-control" placeholder="ابحث الان" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <button class="search_button btn">ابحث الان</button>
                                    </form>
                                </div>
                            </div>
                        </div>
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="card text-right">--}}
{{--                                <h5 class="card-header">أقسام المدونه</h5>--}}
{{--                                <div class="card-body text-right">--}}
{{--                                    <ul class="category_list_of_blog pr-0">--}}
{{--                                        <li><a href="">أخبار مشروعك</a></li>--}}
{{--                                        <li><a href="">أخبار مشروعك</a></li>--}}
{{--                                        <li><a href="">أخبار مشروعك</a></li>--}}
{{--                                        <li><a href="">أخبار مشروعك</a></li>--}}
{{--                                        <li><a href="">أخبار مشروعك</a></li>--}}
{{--                                        <li><a href="">أخبار مشروعك</a></li>--}}
{{--                                        <li><a href="">أخبار مشروعك</a></li>--}}

{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-lg-12 text-right">
                            <div class="card card_of_vedio" style="width: 100%;">
                                <h6 class="card-header">احدث الدورات</h6>

                                <div class="card-body">
                                    @isset($latestCourses)
                                        @foreach($latestCourses as $course)
                                    <div class="row news_blogs">
                                        <div class="col-auto">

                                            <img src="{{ asset('storage/'.$course->image) }}" width="80px" alt="">
                                        </div>
                                        <div class="col another_courses pr-0">
                                            <h6 class=" title_of_another_course">{{$course->name}}</h6>
                                        </div>
                                    </div>
                                        @endforeach
                           @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @isset($courses).
                    @foreach($courses as $course)
                        <div class="col-lg-4">
                            <div class="card " style="width: 100%;">
                                <div class="image_news_about_your_project">
                                    <img src="{{ asset('storage/'.$course->image) }}" class="card-img-top img-fluid" alt="...">
                                </div>
                                <div class="card-body text-right">
                                    <h5 class="card-title">{{$course->name}}</h5>
                                    <p class="card-text">{!! Str::limit($course->description,150 )!!}</p>

                                    <div class="button_of_courses text-center">
                                        <a class="btn btn-primary" href="{{route("view.courses.show",$course->id)}}" role="button">اشترك الان</a>

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="row text-right" dir="rtl">
                                        <div class="col-md-12">
                                            <ul class="list_of_blog">
                                                <li> تاريخ : {{$course->date}}</li>
{{--                                                <li><i class="fa-solid fa-folder"></i><span>المكان : {{$course->city}}</span></li>--}}
                                            </ul>
                                        </div>
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
    </section>
    <!-- end section about your project -->
@endsection

