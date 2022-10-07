@extends("front.layouts.front")
@section("title","جمعية جود | المتجر الالكتروني")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- search_box start -->
    <section class="search_side" dir="rtl" >

        <div class="s130 row">
            <div class="col-md-12 title_design">
                <h2 class="text-center pt-5 p-5">المتجر الالكتروني</h2>
            </div>

            <div class="col-md-9 search_box">
                <form action="{{route("view.ecommerce.search")}}" method="post">
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

    <!-- section of news_about_your_projerct -->
    <section class="news_about_your_projerct" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @isset($ecommerce)
                            @foreach($ecommerce as $product)
                        <div class="col-lg-4">
                            <div class="card " style="width: 100%;">
                                <div class="image_news_about_your_project">
                                    <img src="{{asset("storage/".$product->image)}}" class="card-img-top img-fluid" alt="...">
                                </div>
                                <div class="card-body text-right">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <h6 class="mt-4"><strong>سعر المنتج : </strong> {{$product->price}} </h6>
                                    <p class="card-text">{!!Str::limit($product->short_description,150)  !!}</p>
                                    <div class="button_of_courses text-center">
                                        <a class="btn btn-primary" href="{{route("view.ecommerce.show",$product->id)}}" role="button">عرض المنتج</a>

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

