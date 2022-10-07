@extends("front.layouts.front")
@section("title","جمعية جود | التقارير السنوية")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- di.dashboard -->
    <div class="new_of_teath lawaeh_alseyasat" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12 title_design">
                    <h2 class="text-center pt-5 p-5">
                        التقارير السنوية</h2>
                </div>
@isset($reports)
    @foreach($reports as $report)
                <div class="col-lg-12 pt-3 pb-4">
                    <div class="row">
                        <div class="col text-right">
                            <h5>
                                {{$report->name}}
                            </h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-primary" target="_blank" href="{{asset("storage/".$report->file)}}" role="button">طباعة</a>

                        </div>
                    </div>
                </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
    <!-- end dashboard -->

@endsection

