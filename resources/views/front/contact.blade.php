@extends('front.layouts.front')
@section('title', 'جمعية جود | تواصل معنا')
@section('slider')

    <div class="hero_index hero_index_for_sub_pages">

    </div>

@endsection
@section('content')
    <!-- start registeration -->
    <section class="studys" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12 title_design">
                    <h2 class="text-center pt-5 p-5">تواصل معنا</h2>
                </div>


                <div class="col-lg-12 mt-5">
                    <div class="row">
                       <div class="col-lg-6 col-md-6">
                            <div class="card card_of_study" style="width: 100%;">
                                <div class="card-body pt-0 text-right">
                                    <img src="{{asset("front/images/Web 1920 – 1.png")}}"
                                        class="img-fluid" alt="">
                                    <div class="content content_contact p-4 pt-5">
                                        <div class="row">
                                            <div class="col-lg-6 pb-3">
                                                <h3><a href="mailto:{{ $setting->email ?? 'jawwed@jawwed' }}"><i
                                                            class="fa-solid fa-message"></i><span class="dash">|</span>
                                                        <span class="mobile">{{ $setting->email ?? 'jawwed@jawwed' }}</span></a></h3>
                                            </div>
                                            <div class="col-lg-6 pb-3">
                                                <h3><a href="tel:{{ $setting->phone ?? '+9665xxxxxxxx' }}"><i
                                                            class="fa-solid fa-phone"></i><span class="dash">|</span>
                                                        <span class="mobile">{{ $setting->phone ?? '+9665xxxxxxxx' }}</span></a></h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card card_of_study" style="width: 100%;">
                                <div class="card-body pt-0 text-right">
                                    <div class="content content_contact_message p-4">
                                        <h3>ارسل لنا رسالة</h3>
                                        <x-alert />
                                        <form class="pt-3" method="POST" id="contactForm" action="{{ route('view.contact.index') }}">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="الاسم......">
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="البريد الالكتروني......" value="{{ old('email') }}" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="رقم الهاتف ..........." name="phone" value="{{ old('phone') }}" id="inputPassword4">
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label for="formGroupExampleInput">نوع التواصل</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="0">.....</option>

                                                    <option value="1">شكاوى</option>
                                                    <option value="2">إقتراحات</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1"  name="message" rows="5">{{ old('message') }}</textarea>
                                            </div>
                                            <div class="form-group text-left ">

                                                <button type="submit" id="submit_contact" onclick="disableButton()" class="btn btn-primary">ارسال</button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end registeration -->


@endsection


@section('js')
    <script>
        function disableButton(){
            document.getElementById('contactForm').submit();
            document.getElementById('submit_contact').disabled = true;
        }
    </script>
@endsection
