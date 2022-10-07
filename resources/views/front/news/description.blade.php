@extends("front.layouts.front")
@section("title","جمعية جود | الدورات")
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
                                                <img src="{{ asset('storage/'.$news->main_image) }}" class="img-fluid" width="100%" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 desc_of_blog_content text-right pt-5 ">
                                            <h2>{{$news->title}}</h2>
                                            <p>{!! $news->description !!}</p>
                                        </div>
                                        <div class="col-lg-12 desc_of_blog_content text-right pt-5 " dir="rtl">
                                            <h3 class="mt-3 mb-4">صور اخرى للخبر</h3>
                                           <div class="row">
                                               @isset($news->images)
                                               @foreach($news->images as $gallery)
                                               <div class="col-md-4 mt-3">
                                                   <img src="{{ asset('storage/'.$gallery->image) }}"  width="100%" height="100%" alt="">
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




                </div>

            </div>
        </div>
    </section>
    <!-- end blog of content -->
@endsection

