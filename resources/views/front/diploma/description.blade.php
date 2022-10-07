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
                                <div class="text-right">
                                    <x-alert/>

                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-12 pr-0 pl-0">
                                            <div class="image_bg_of_cover_blog">
                                                <img src="{{ asset('storage/'.$course->image) }}" class="img-fluid" width="100%" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 desc_of_blog_content text-right pt-5 ">
                                            <h2>{{$course->name}}</h2>
                                        </div>

                                        <div class="col-lg-12 text-right">
                                            <h5 class="mt-3"><label for=""><strong>اسم الدبلومة : </strong></label> <label for=""> {{$course->name}}</label></h5>
                                            <h5 class="mt-3"><label for=""><strong> مدة الدبلومة : </strong></label> <label for="">{{$course->period}}</label></h5>
                                            <h5 class="mt-3"><label for=""><strong> الشهادة المعتمدة : </strong></label> <label for=""> {{$course->certificate}}</label></h5>

                                            <h5 class="mt-3"><label for=""><strong> مقدم الدبلوم: </strong></label> <label for=""> {{$course->trainer}}</label></h5>
                                            <h5 class="mt-3"><label for=""><strong>السعر : </strong></label> <label for="">{{$course->price}}</label></h5>
                                            @isset($course->goals)
                                            <h5 class="mt-3"><label for=""><strong>اهداف الدبلومة : </strong></label>
                                            <ol>
                                                @foreach($course->goals as $goal)


                                                <li class="mt-3">{{$goal->name}}</li>
                                                @endforeach
                                            </ol>

                                            </h5>
                                            @endisset
                                            <h5 class="mt-3"><label for=""><strong>عن الدبلومة : </strong></label> <label for="">{!!$course->description  !!}</label></h5>

                                        </div>


                                    </div>

                                </div>

                            </div>
                        </div>

                        @if(auth()->check())
                            @if($diplomaUser = \App\Models\DiplomaUser::where("diploma_id",$course->id)->where("user_id",auth()->id())->latest()->first())
                                @if($diplomaUser->status =='0')
                                    <div class="col-lg-12 mt-5 pt-5 text-center subscribe_button">
                                        <a class="btn btn-primary" href="javascript:;" role="button">طلبك قيد المراجعة</a>

                                    </div>
                                    @elseif($diplomaUser->status =='1')
                                    <div class="col-lg-12 mt-5 pt-5 text-center subscribe_button">
                                        <a class="btn btn-primary" href="javascript:;" role="button">تم التسجيل في هذه الدبلومة</a>

                                    </div>
                                    @else
                                    <div class="col-lg-12 mt-5 pt-5 text-center subscribe_button">
                                        <a class="btn btn-primary" href="{{route("view.diploma.paymentView",$course->id)}}" role="button">تسجيل في الدبلومة</a>

                                    </div>
                           @endif
                            @else
                                <div class="col-lg-12 mt-5 pt-5 text-center subscribe_button">
                                    <a class="btn btn-primary" href="{{route("view.diploma.paymentView",$course->id)}}" role="button">تسجيل في الدبلومة</a>

                                </div>
                            @endif
                                @else
                                <div class="col-lg-12 mt-5 pt-5 text-center subscribe_button">
                                    <a class="btn btn-primary" href="{{route("view.diploma.paymentView",$course->id)}}" role="button">تسجيل في الدبلومة</a>

                                </div>
                        @endif
                    </div>





                </div>

            </div>
        </div>
    </section>
    <!-- end blog of content -->
@endsection

