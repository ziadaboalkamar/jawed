@extends('front.layouts.front')
@section('title', 'جمعية جود | تسجيل طلب العضوية')
@section('slider')

    <div class="hero_index hero_index_for_sub_pages">

    </div>

@endsection
@section('content')
    <!-- start registeration -->

    <section class="memberShipDesc  new_of_teath" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12 title_design">
                    <h2 class="text-center pt-5 p-5">تسجيل العضوية </h2>
                </div>

                <div class="col-lg-12 text-right">
                    @isset($membership->goals)
                    <h4>اهداف العضوية</h4>
                    <div class="pt-3 pb-3">{!! $membership->goals !!}</div>
                    @endisset
                        @isset($membership->features)

                    <h4>مميزات العضوية</h4>
                    <div class="pt-3 pb-3">{!! $membership->features !!}</div>
                        @endisset
                    <h4>انواع العضويات</h4>
                    <div class="row pt-5">
                        @php
                            if(isset($membership->types) ){
                                    $types = json_decode($membership->types);

}
                            else {
                                $types = [];
                            }

                        @endphp
                        @foreach ($types ?? [] as $goal)
                            <div class="col-lg-3 mt-2">
                                <div class="adweya_type">
                                    <h5> {{ $goal }}</h5>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12 mt-5 pt-5 text-center subscribe_button">
                            <a class="btn btn-primary" href="{{ route('view.membership.index') }}" role="button">تسجيل عضوية</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end registeration -->


@endsection
