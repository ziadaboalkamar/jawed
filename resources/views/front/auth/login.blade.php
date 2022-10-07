<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>{{ App\Models\Websit::first()->websit_title ?? 'جمعية جود النسائية' }} | تسجيل دخول</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}?<?php echo time(); ?>">
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&amp;display=swap"
      rel="stylesheet">
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="{{ asset('front/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/aos/aos.min.css') }}">
    <!-- Link Swiper's CSS -->
   <link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}">
   <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
   <link rel="stylesheet" href="{{ asset('front/css/owl.css') }}">

    <!-- Demo styles -->
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>
  </head>

  <body class="gray_body">

      <!-- end nav bar -->
      <!-- start registeration -->
      <section class="registeration" dir="rtl">
          <div class="container">
              <div class="row">
                <div class="col-lg-12 login_form mt-5">
                    <div class="card login_card login m-auto">
                        <div class="card-body text-center">
                            <div class="head">
                            <!--<div class="img_logo_for_registeration text-center">-->
                            <!--  <a href="{{route('view.index')}}">-->
                            <!--    <img src="{{ asset('storage/'.(App\Models\Websit::first()->logo ?? '')) }}" alt="">-->
                            <!--  </a>-->
                            <!--</div>-->
                            <h3 class="title_under_login">تسجيل الدخول</h3>
                            <x-alert />
                        </div>

                        <form action="{{ route('login') }}" class="text-right" method="POST">
                            @csrf
                            <div class="form-group pb-4">
                              <label for="exampleInputEmail1" class="pb-1">اسم المستخدم او البريد الالكتروني</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group pb-4">
                              <label for="exampleInputPassword1"  class="pb-1">كلمة المرور</label>
                              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 form-check">
                                  <label class="container">حفظ البيانات
                                    <input type="checkbox" name="remember" checked="checked">
                                    <span class="checkmark"></span>
                                  </label>    </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">تسجيل المستخدم</button>
                                </div>
                              </div>

                          </form>
                          <hr>
                          <div class="row">
                            {{-- <div class="col text-right">
                              <a class="main_color" href="" >هل نسيت كلمة المرور ؟</a>

                            </div> --}}
                            <div class="col text-left">
                              <a class="main_color" href="{{route("register")}}">أنشاء حساب جديد</a>

                            </div>
                          </div>
                        </div>
                      </div>
                </div>

            </div>
          </div>
      </section>
      <!-- end registeration -->



    <!-- end magazine -->


    <!-- Swiper JS -->
    <script src="{{ asset('front/js/swiper.js') }}"></script>
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('front/vendor/aos/aos.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <!-- Initialize Swiper -->

  </body>
</html>
