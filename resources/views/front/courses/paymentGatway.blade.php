@extends("front.layouts.front")
@section("title","جمعية جود | اللوائح والسياسات")
@section("slider")

        <div class="hero_index hero_index_for_sub_pages">

        </div>

@endsection
@section("content")
    <!-- start desc -->
    <section class="choose_and_take">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card  mb-5 bg-body rounded" style="width: 80%;">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <h4 class="description-subtitle">
                                        الرجاء اختيار طريقة الدفع لاتمام الدفع
                                    </h4>
                                    <h2 class="description-title pt-2">طرق الدفع</h2>
                                </div>
                                <div class="col-md-12">
                                    <x-alert/>
                                    <form action="{{route("view.courses.paymentView",$course->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 mb-5 ">
                                                <div class="form-check">
{{--                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>--}}
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        تحويل بنكي
                                                    </label>
                                                </div>
                                                <h6>الرجاء تحويل المبلغ عن طريق احدى الحسابات البنكية و ارفاق ايصال التحويل : </h6>
                                                <div class="input-group mb-3 text-left" dir="ltr">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupFileAddon01">upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">اختيار الملفات</label>
                                                    </div>
                                                </div>
                                                <h6>من ثم التواصل على الرقم (  {{\App\Models\Websit::first()->phone?? " " }} ) لتاكيد الحجز </h6>

                                            </div>
{{--                                            <div class="col-lg-12">--}}
{{--                                                <div class="form-check">--}}
{{--                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>--}}
{{--                                                    <label class="form-check-label" for="exampleRadios2">--}}
{{--                                                        الدفع مباشر عن طريق ادخال معلومات البطاقة البنكية--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <label for="formGroupExampleInput">رقم البطاقة</label>--}}

{{--                                                        <input type="text" class="form-control" placeholder="رقم البطاقة">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-md-8">--}}
{{--                                                        <label for="formGroupExampleInput">تاريخ انتهاء البطاقة</label>--}}

{{--                                                        <input type="text" class="form-control" placeholder="تاريخ انتهاء البطاقة">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="formGroupExampleInput">CVV</label>--}}

{{--                                                        <input type="text" class="form-control" placeholder="CVV">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-md-12">--}}
{{--                                                        <label for="formGroupExampleInput">اسم صاحب البطاقة</label>--}}

{{--                                                        <input type="text" class="form-control" placeholder="اسم صاحب البطاقة">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>

                                        <div class="col-md-12 text-center button-accept">
                                            <button type="submit" class="btn btn-primary">اتمام التسجيل </button>

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
@section("js")

    <script>
        $('#inputGroupFile01').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

    </script>

@endsection

