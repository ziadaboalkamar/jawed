@extends('front.layouts.front')
@section('title', 'جمعية جود | تسجيل للعضوية')
@section('slider')

    <div class="hero_index hero_index_for_sub_pages">

    </div>

@endsection
@section('content')
    <!-- start desc -->
    <section class="choose_and_take">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right important_notes" dir="rtl">
                    <h4>ملاحظة هامة</h4>
                    <ol>
                        <li>التحويل البنكي على الايبان رقم ( )</li>
                        <li>حفظ صورة الايصال</li>
                        <li>الرجاء تعبئة جميع البيانات</li>
                    </ol>
                </div>
                <div class="col-lg-12">
                    <div class="card  mb-5 bg-body rounded" style="width: 80%;">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <h4 class="description-subtitle">سجل بياناتك وسيتم التواصل معكم لتأكيد العضوية
                                    </h4>
                                    <h2 class="description-title pt-2">تسجيل العضوية </h2>
                                </div>
                                <div class="col-md-12">
                                    <x-alert />
                                    <form  method="POST" id="contactForm" action="{{ route('view.membership.index') }}" enctype="multipart/form-data">
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

                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">المدينه</label>

                                                <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="المدينه ">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">المهنة</label>

                                                <input type="text" class="form-control" name="job_name" value="{{ old('job_name') }}" placeholder="المهنة ">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">عنوان العمل </label>

                                                <input type="text" class="form-control" name="job_address" value="{{ old('job_address') }}" placeholder="عنوان العمل ">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">رقم البطاقة الشخصية</label>

                                                <input type="text" class="form-control" name="id_number" value="{{ old('id_number') }}"
                                                    placeholder="رقم البطاقة الشخصية ">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">تاريخها</label>

                                                <input type="date" class="form-control" name="id_date" value="{{ old('id_date') }}" placeholder="تاريخها ">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="formGroupExampleInput">مصدرها</label>

                                                <input type="text" class="form-control" name="id_source" value="{{ old('id_source') }}" placeholder=" مصدرها">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">رقم الجوال</label>

                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="05xxxxxxxx">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">مكان الاقامة</label>

                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder=" مكان الاقامة">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">رقم الهاتف</label>

                                                <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="05xxxxxxxx">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">العنوان البريدي</label>

                                                <input type="text" class="form-control" name="post_address" value="{{ old('post_address') }}" placeholder="05xxxxxxxx">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">نوع العضوية</label>
                                                <select class="form-control" name="type" id="exampleFormControlSelect1">
                                                    @php
                                                        if(isset($membership->types))
                                                            $types = json_decode($membership->types);
                                                        else {
                                                            $types = [];
                                                        }

                                                    @endphp
                                                    @foreach ($types ?? [] as $goal)
                                                        <option @if(old('type') == $goal) selected @endif value="{{ $goal }}">{{ $goal }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput">تاريخ البدء</label>

                                                <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control" placeholder="تاريخ البدء">
                                            </div>

                                            <div class="col-md-12">
                                                <label for="formGroupExampleInput">الرجاء ارفاق الايصال البنكي للحوالة
                                                    هنا</label>

                                                <div class="input-group mb-3" dir="ltr">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroupFileAddon01">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input "
                                                            id="inputGroupFile01" name="tranfer_file"
                                                            aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label text-left"
                                                            for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center button-accept">
                                                <button type="button" id="submit_contact" onclick="disableButton()" class="btn btn-primary">تأكيد العضوية</button>

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
        
        
                $('#inputGroupFile01').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>





@endsection
