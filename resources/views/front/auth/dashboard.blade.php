@extends("front.layouts.front")
@section("title","جمعية جود | لوحة التحكم")

@section("slider")
    <div class="hero_index hero_index_for_sub_pages">

    </div>
@endsection
@section('content')
    <!-- end nav bar -->
    <section class="profile">
        <div class="container rounded bg-white mt-5 mb-5" dir="rtl">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5" width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                            class="font-weight-bold">{{ $user->full_name }}</span><span
                            class="text-black-50">{{ $user->email }}</span><span> </span></div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="settings-tab" data-toggle="tab"
                                data-target="#settings" type="button" role="tab" aria-controls="settings"
                                aria-selected="false">البيانات الشخصية</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">الدورات
                                التدريبية المسجلة</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="messages-tab" data-toggle="tab" data-target="#messages"
                                type="button" role="tab" aria-controls="messages" aria-selected="false">الدبلومات
                                المهنية المسجلة</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="home-tab" data-toggle="tab" data-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">تعديل البيانات الشخصية</button>
                        </li>
                    </ul>

                </div>
                <div class="col-md-9 border-left">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane " id="home" role="tabpanel" aria-labelledby="home-tab">
                            @php
                                $name = explode(' ', $user->full_name, 2);
                                $f_name = $name[0];
                                $l_name = $name[1];
                            @endphp
                            <div class="p-3 py-5 text-right">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">تعديل البيانات الشخصية</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">الاسم</label><input type="text"
                                            class="form-control" name="f_name" placeholder="first name" value="{{ $f_name ?? '' }}"></div>
                                    <div class="col-md-6"><label class="labels">العائلة</label><input type="text"
                                            class="form-control" name="l_name" value="{{ $l_name }}" placeholder="surname"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">رقم الهاتف</label><input
                                            type="text" class="form-control" name="phone" placeholder="enter phone number"
                                            value="{{ $user->phone }}"></div>
                                    <div class="col-md-12"><label class="labels">الايميل</label><input type="text"
                                            class="form-control" name="email" placeholder="enter email id" value="{{ $user->email }}"></div>
                                    <div class="col-md-12"><label class="labels">اسم المستخدم</label><input type="text"
                                            class="form-control" name="user_name" placeholder="education" value="{{ $user->user_name }}"></div>
                                </div>

                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                        type="button">حفظ التعديلات</button></div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <!-- section of news_about_your_projerct -->
                            <section class="news_about_your_projerct" dir="rtl">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-lg-12" style="text-align: center;">
                                            @if(count($courses) != 0)
                                                <h3>الدورات المسجلة</h3>
                                                <div class="row">
                                                    @foreach($courses as $course)
                                                        <div class="col-lg-4">
                                                            <div class="card " style="width: 100%;">
                                                                <div class="image_news_about_your_project">
                                                                    <img src="{{ asset('storage/'.$course->image) }}"
                                                                        class="card-img-top img-fluid" alt="...">
                                                                </div>
                                                                <div class="card-body text-right">
                                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                                    <p class="card-text">المدرب : {{ $course->trainer }}</p>
                                                                    <p class="card-text">مدة الدورة : {{ $course->period }}</p>
                                                                    <p class="card-text">حالة التسجيل : @if($course->pivot->status == '0') <span class="not-approved">غير مؤكد</span> @else <span class="approved">مؤكد</span> @endif</p>

                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="row text-right" dir="rtl">
                                                                        <div class="col-md-12">
                                                                            <ul class="list_of_blog">
                                                                                <li>{{ $course->date }}</li>
                                                                                <li><span>{{ $course->city }}</span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <h3>الدورات المسجلة</h3>
                                                <p>لا يوجد دورات مسجلة ..</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end section about your project -->
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <!-- section of news_about_your_projerct -->
                            <section class="news_about_your_projerct" dir="rtl">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-lg-12" style="text-align: center;">
                                            @if(count($diplomas) != 0)
                                                <h3>الدبلومات المسجلة</h3>
                                                <div class="row">
                                                    @foreach($diplomas as $diploma)
                                                        <div class="col-lg-4">
                                                            <div class="card " style="width: 100%;">
                                                                <div class="image_news_about_your_project">
                                                                    <img src="{{ asset('storage/'.$diploma->image) }}"
                                                                        class="card-img-top img-fluid" alt="...">
                                                                </div>
                                                                <div class="card-body text-right">
                                                                    <h5 class="card-title">{{ $diploma->name }}</h5>
                                                                    <p class="card-text">مدة الدبلوم : {{ $diploma->period }}</p>
                                                                    <p class="card-text">المدرب : {{ $diploma->trainer }}</p>
                                                                    <p class="card-text">حالة التسجيل : @if($diploma->pivot->status == '0') <span class="not-approved">التسجيل غير مؤكد</span> @else <span class="approved">التسجيل غير مؤكد</span> @endif</p>

                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="row text-right" dir="rtl">
                                                                        <div class="col-md-12">
                                                                            <ul class="list_of_blog">
                                                                                <li>مدة الدبلوم : {{ $diploma->period }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <h3>الدبلومات المسجلة</h3>
                                                <p>لا يوجد دبلومات مسجلة ..</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end section about your project -->
                        </div>
                        <div class="tab-pane active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <section class="main_profile mt-5 pt-5">
                                <div class="containetr">
                                    <div class="row">
                                        <div class="col-lg-6 mb-5">
                                            <div class="courses">
                                                <div class="row">

                                                    <div class="col-auto">
                                                        <i class="fa-solid fa-building-columns"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h4>عدد الدورات المسجلة</h4>
                                                        <h2>{{ $coursesCount }}</h2>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 mb-5">
                                            <div class="courses courses_dawrat">
                                                <div class="row">

                                                    <div class="col-auto">
                                                        <i class="fa-solid fa-building-columns"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h4>عدد الدبلومات المهنية المسجلة</h4>
                                                        <h2>{{ $diplomasCount }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 text-right pt-5 mt-5">
                                            <h5 class="mt-3"><label for=""><strong>الايميل :
                                                    </strong></label> <label for="">{{ $user->email }}</label></h5>
                                            <h5 class="mt-3"><label for=""><strong> الاسم :
                                                    </strong></label> <label for=""> {{ $user->full_name }}</label></h5>
                                            <h5 class="mt-3"><label for=""><strong> رقم الجوال :
                                                    </strong></label> <label for=""> {{ $user->phone }}</label></h5>


                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- end magazine -->
@endsection

@section("js")
    <script>
        var swiper = new Swiper(".mySwiper", {
            direction: "vertical",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endsection
