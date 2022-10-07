@extends("front.layouts.front")
@section("title","جمعية جود | شركاء النجاح")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- start partners   -->
    <section class="partners partner_page_single" data-aos="fade-up"
             data-aos-anchor-placement="top-bottom" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center pt-5 p-5">شركاء النجاح</h2>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @isset($partners)
                            @foreach($partners as $partner)
                        <div class="col-lg-4">
                            <div class="card bg-white rounded mb-5" style="width: 100%;">
                                <div class="card-body">
                                    <img width="100%" src="{{asset("storage/".$partner->image)}}" alt="">
                                </div>
                            </div>

                        </div>
                            @endforeach
                        @endisset
                    </div>

                </div>
            </div>
    </section>
    <!-- end partners -->
@endsection

