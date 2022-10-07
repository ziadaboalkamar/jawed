@extends("front.layouts.front")
@section("title","جمعية جود | شركاء النجاح")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <section dir="rtl">

        <div class="faq_area pt-4 pb-4" id="faq">
            <div class="container">

                <div class="row justify-content-center text-right">
                    <div class="col-md-12 title_design">
                        <h2 class="text-center pt-5 p-5">الاسئلة الشائعة</h2>
                    </div>

                    <!-- FAQ Area-->
                    <div class="col-12 col-sm-10 col-lg-8">
                        <div class="accordion faq-accordian" id="faqAccordion">
                            @isset($faqs)
                                @foreach($faqs as $key=>$faq)
                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="card-header" id="heading{{$key}}">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">{{$faq->question}}<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapse{{$key}}" aria-labelledby="heading{{$key}}" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>{{$faq->description}}</p>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endisset
                       </div>
                        <!-- Support Button-->
                        <div class="support-button text-center d-flex align-items-center justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <i class="lni-emoji-sad"></i>
                            <p class="mb-0 px-2">لم تجد اجابة لسؤالك</p>
                            <a href="{{route("view.contact.index")}}"> تواصل معنا</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start tdawal know -->
    </section>


    <!-- end magazine -->
@endsection

