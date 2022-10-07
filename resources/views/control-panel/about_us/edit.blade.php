@extends('layout.app')
@section('title')
    {{ __('من نحن') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('من نحن') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <x-alert/>
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('about-us-update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="image" class="form-label">{{ __('الصورة') }}</label>
                                    <div class="form-group fallback w-100">

                                        <input type='file' onchange="loadFile_image1(image)" name="image" id="image"
                                        class="@error('image') is-invalid @enderror"
                                        style="display:none;"/>
                                        <button id="output_logo1" type="button"
                                                onclick="document.getElementById('image').click();" value="emad"
                                                style="
                                                    width: 100%;
                                                    height: 200px;
                                                    border-radius: 10px;
                                                    background-color: #0a1128;
                                                    background-image: url({{ asset('storage/'.($about_us->image ?? 'default.png')) }});
                                                    background-repeat: no-repeat;
                                                    background-size: cover;
                                                    background-position: center;
                                                    "/>
                                    </div>
                                </div>
                                <script>
                                    var loadFile_image1 = function (image1) {
                                        var image1 = document.getElementById('output_logo1');
                                        var src1 = URL.createObjectURL(event.target.files[0]);
                                        image1.style.backgroundImage = 'url(' + src1 + ')';
                                    };
                                </script>

                                {{-- project title --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea name="description" class="form-control"  rows="8">{{ old('description',($about_us->description ?? '')) }}</textarea>
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- project title --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="goals" class="form-label">{{ __('الاهداف') }}</label>
                                        <textarea name="goals" class="form-control"  rows="8">{{ old('goals',($about_us->goals ?? '')) }}</textarea>
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- project title --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="message" class="form-label">{{ __('الرسالة') }}</label>
                                        <textarea name="message" class="form-control"  rows="8">{{ old('message',($about_us->message ?? '')) }}</textarea>
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- project title --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="vision" class="form-label">{{ __('الرؤية') }}</label>
                                        <textarea name="vision" class="form-control"  rows="8">{{ old('vision',($about_us->vision ?? '')) }}</textarea>
                                    </div>
                                </div>
                                {{-- end project title --}}



                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection

