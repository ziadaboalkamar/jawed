@extends('front.layouts.front')
@section('title', 'جمعية جود | طلب التطلوع')
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
                      التطوع للتطوع و سيتم التواصل معكم لاتمام التسجيل
                  </h4>
                  <h2 class="description-title pt-2">تطوع معنا </h2>
                </div>
                <div class="col-md-12">
                    <x-alert />
                  <form method="POST" id="contactForm" action="{{ route('view.volunteer.index') }}">
                    @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <label for="formGroupExampleInput">الاسم الاول</label>

                        <input type="text" class="form-control" name="f_name" value="{{ old('f_name') }}" placeholder="الاسم الاول">
                      </div>
                      <div class="col-md-4">
                        <label for="formGroupExampleInput">اسم الاب</label>

                        <input type="text" class="form-control" name="m_name" value="{{ old('m_name') }}" placeholder="اسم الاب">
                      </div>
                      <div class="col-md-4">
                        <label for="formGroupExampleInput">اسم العائلة</label>

                        <input type="text" class="form-control" name="l_name" value="{{ old('l_name') }}" placeholder="اسم العائلة">
                      </div>
                      <div class="col-md-6">
                        <label for="formGroupExampleInput">رقم الجوال</label>

                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="05xxxxxxxx">
                      </div>
                      <div class="col-md-6">
                        <label for="formGroupExampleInput">البريد الالكتروني</label>

                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@example.com">
                      </div>

                      <div class="col-md-12">
                        <label for="formGroupExampleInput">مجال التطوع المرغوب به</label>

                        <input type="text" class="form-control" name="domin" value="{{ old('domin') }}" placeholder="مجال التطوع المرغوب به">
                      </div>
                    </div>
                    <div class="col-md-12 text-center button-accept">
                      <button type="button" id="submit_contact" onclick="disableButton()" class="btn btn-primary">تأكيد التطوع</button>

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
