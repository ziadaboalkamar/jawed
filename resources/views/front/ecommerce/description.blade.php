@extends("front.layouts.front")
@section("title","جمعية جود | المتجر الالكتروني")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- section of blog content -->
    <section class="blog_content news_about_your_projerct" dir="rtl">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-12 pr-0 pl-0">
                                            <div class="image_bg_of_cover_blog">
                                                <img src="{{ asset('storage/'.$news->image) }}" class="img-fluid" width="100%" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 desc_of_blog_content text-right pt-5 ">
                                            <h2>{{$news->name}}</h2>
                                            <h5 class="mt-3"><label for=""><strong>اسم المنتج : </strong></label> <label for=""> {{$news->name}}</label></h5>

                                            <h5 class="mt-3"><label for=""><strong>سعر المنتج : </strong></label> <label for="">{{$news->price}}</label></h5>
                                            <h5 class="mt-3"><label for=""><strong>عن المنتج : </strong></label> <label for="">{!! $news->description !!}</label></h5>
                                            
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

