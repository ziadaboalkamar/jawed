
@extends('authentication.layout.app')
@section('title')
    {{__('تسجيل دخول')}}
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v1 px-2">
                <div class="auth-inner py-2">
                    <!-- Login v1 -->
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="javascript:void(0);" class="brand-logo">
                                <h2 class="brand-text text-primary ml-1 mt-1">{{ App\Models\Websit::latest()->first()->websit_title ?? 'جمعية جوِد النسائية'}}</h2>
                            </a>

                            <h4 class="card-title mb-1">{{__('تسجيل دخول')}}</h4>
                            <x-alert />
                             <form action="{{ route('admin.login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email"><strong>{{ __('Email Or Username') }}</strong></label>
                                    <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}" autofocus >
                                </div>

                                <div class="form-group">
                                    <label for="password"><strong>{{ __('Password') }}</strong></label>
                                    <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">
                                </div>
                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                       <div class="custom-control custom-checkbox ml-1">
                                            <input type="checkbox" id="remember_me" class="custom-control-input" id="basic_checkbox_1" name="remember">
                                            <label class="custom-control-label" for="basic_checkbox_1" for="remember_me">{{ __('Remember me') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Sign me in') }}</button>
                                </div>
                            </form>

                            {{-- <p class="text-center mt-2">
{{--                                <span>New on our platform?</span>--}}
                                {{-- <a href="{{route('register')}}">
                                    <span>{{__('تسجيل مستخدم جديد')}}</span>
                                </a>
                            </p> --}}

                            {{--                            <div class="divider my-2">--}}
                            {{--                                <div class="divider-text">or</div>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="auth-footer-btn d-flex justify-content-center">--}}
                            {{--                                <a href="javascript:void(0)" class="btn btn-facebook">--}}
                            {{--                                    <i data-feather="facebook"></i>--}}
                            {{--                                </a>--}}
                            {{--                                <a href="javascript:void(0)" class="btn btn-twitter white">--}}
                            {{--                                    <i data-feather="twitter"></i>--}}
                            {{--                                </a>--}}
                            {{--                                <a href="javascript:void(0)" class="btn btn-google">--}}
                            {{--                                    <i data-feather="mail"></i>--}}
                            {{--                                </a>--}}
                            {{--                                <a href="javascript:void(0)" class="btn btn-github">--}}
                            {{--                                    <i data-feather="github"></i>--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <!-- /Login v1 -->
                </div>
            </div>

        </div>
    </div>
@endsection
