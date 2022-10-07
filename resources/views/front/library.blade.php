@extends("front.layouts.front")
@section("title","جمعية جود | المكتبة")
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
                    <h2 class="text-center pt-5 p-5">المكتبة</h2>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        @isset($library)
                            @foreach($library as $book)
                        <div class="col-lg-4">
                            <div class="card " style="width: 100%;">
{{--                                <div class="image_news_about_your_project">--}}
{{--                                    <img src="{{asset("storage/".$book->image)}}" class="card-img-top img-fluid" alt="...">--}}
{{--                                </div>--}}
                                <div class="card-body text-right">
                                    <h5 class="card-title">{{$book->name}}</h5>
{{--                                    <p class="card-text">وقعت شركة مشروعك للاستشارات الاقتصادية، بروتكول تعاون، مع مجمع عمال مصر لخدمات الاستثمار، خلال اجتماع لمناقشة سبل تطوير الخدمات بما يواكب رغبات المستثمرين. وذلك بحضور رامي شعلان</p>--}}
                                    <div class="button_of_courses text-center">
                                        <a class="btn btn-primary" href="{{$book->file}}" role="button">تحميل</a>

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="row text-right" dir="rtl">
                                        <div class="col-md-12">
                                            <ul class="list_of_blog">
                                                <li>تم نشره في : {{\Carbon\Carbon::parse($book->created_at)->format('d/m/Y') }}</li>
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
