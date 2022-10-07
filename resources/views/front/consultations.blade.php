@extends('front.layouts.front')
@section('title', 'جمعية جود | تواصل معنا')
@section('slider')

    <div class="hero_index hero_index_for_sub_pages">

    </div>

@endsection
@section('content')

    <!-- start desc -->
    <section class="choose_and_take">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card  mb-5 bg-body rounded" style="width: 80%;">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <h4 class="description-subtitle">الرجاء تعبئة البيانات المطلوبة ليتم تأكيد طلبكم
                                        و سيتم التواصل معكم لاتمام طلب الاستشارة
                                    </h4>
                                    <h2 class="description-title pt-2">الاستشارات</h2>
                                </div>
                                <div class="col-md-12">
                                    <x-alert />
                                    <form method="POST" id="contactForm" action="{{ route('view.consultation.index') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">الاسم الاول</label>

                                                <input type="text" class="form-control" name="f_name" placeholder="الاسم الاول">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">اسم الاب</label>

                                                <input type="text" class="form-control" name="m_name" placeholder="اسم الاب">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">اسم العائلة</label>

                                                <input type="text" class="form-control" name="l_name" placeholder="اسم العائلة">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">رقم الجوال</label>

                                                <input type="text" class="form-control" name="phone" placeholder="05xxxxxxxx">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">البريد الالكتروني</label>

                                                <input type="text" class="form-control"
                                                    placeholder="example@example.com" name="email">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">المدينة</label>

                                                <input type="text" class="form-control" name="city" placeholder="المدينة">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">نوع المستفيد</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="0">.....</option>

                                                    <option value="1">مستفيد</option>
                                                    <option value="2">جهات</option>

                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="formGroupExampleInput">الاستشارة</label>

                                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="7"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center button-accept">
                                            <button type="button" id="submit_contact" onclick="disableButton()" class="btn btn-primary">تأكيد الاستشارة</button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- end desc -->

@endsection


@section('js')
    <script>
        function disableButton() {
            document.getElementById('contactForm').submit();
            document.getElementById('submit_contact').disabled = true;
        }
    </script>
@endsection
