@extends("front.layouts.front")
@section("title","جمعية جود | البومات الصور")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("css")
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">

@endsection
@section("content")
    <!-- start section project -->
    <section class="postdetails new_of_teath  pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 title_design">
                    <h2 class="text-center pt-5 p-5">صور الجمعية</h2>
                </div>
@isset($news->photoAlbumImages)
    @foreach($news->photoAlbumImages as $images)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="img_of_post_details hvr-grow">
                        <a href="{{asset("storage/".$images->image)}}" data-toggle="lightbox" data-gallery="gallery" >
                            <img src="{{asset("storage/".$images->image)}}" class="img-fluid">
                        </a>
                    </div>
                </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    <!-- end section project -->

@endsection

@section("js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

@endsection
