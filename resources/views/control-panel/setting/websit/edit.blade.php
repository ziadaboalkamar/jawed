@extends('layout.app')
@section('title')
    {{ __('Website Setting') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Website Setting') }}</h2>
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
                        <form action="{{ route('setting-website-update') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">{{ __('Logo') }}</label>
                                        <input type='file' onchange="loadFile_image(logo)" name="logo" id="logo"
                                               class="@error('logo') is-invalid @enderror"
                                               style="display:none;"/>
                                        <button id="output_logo" type="button"
                                                onclick="document.getElementById('logo').click();" value="emad"
                                                style="
                                                    width: 200px;
                                                    height: 200px;
                                                    border-radius: 50%;
                                                    background-color: #0a1128;
                                                    background-image: url({{ asset('storage/'.($website->logo ?? 'default.png')) }});
                                                    background-repeat: no-repeat;
                                                    background-size: cover;
                                                    background-position: center;
                                                    "/>
                                    </div>
                                </div>
                                <script>
                                    var loadFile_image = function (image) {
                                        var image = document.getElementById('output_logo');
                                        var src = URL.createObjectURL(event.target.files[0]);
                                        image.style.backgroundImage = 'url(' + src + ')';
                                    };
                                </script>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">{{ __('Favicon Image') }}</label>
                                        <input type='file' onchange="loadFile_image1(favicon_image)" name="favicon_image" id="favicon_image"
                                               class="@error('favicon_image') is-invalid @enderror"
                                               style="display:none;"/>
                                        <button id="output_logo1" type="button"
                                                onclick="document.getElementById('favicon_image').click();" value="emad"
                                                style="
                                                    width: 100px;
                                                    height: 100px;
                                                    border-radius: 50%;
                                                    background-color: #0a1128;
                                                    background-image: url({{ asset('storage/'.($website->favicon_image ?? 'default.png')) }});
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
                            {{-- website title --}}
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="websit_title" class="form-label">{{ __('Website Title') }}</label>
                                    <input type="text" id="websit_title" name="websit_title"
                                           value="{{ old('websit_title',($website->websit_title ?? config('app.name', 'Laravel'))) }}"
                                           class="form-control" required>
                                </div>
                            </div>
                            {{-- end website title --}}

                            {{-- website email --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="email" class="form-label">{{ __('Website Email') }}</label>
                                    <input type="email" id="email" name="email"
                                           value="{{ old('email',($website->email ?? config('appInformation.email'))) }}"
                                           class="form-control" required>
                                </div>
                            </div>
                            {{-- end website email --}}

{{--                            <div class="col-lg-6 col-md-12 col-sm-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="url" class="form-label">{{ __('Website URL') }}</label>--}}
{{--                                    <input type="url" id="url" name="url"--}}
{{--                                           value="{{ old('url',($website->url ?? config('appInformation.url'))) }}"--}}
{{--                                           class="form-control" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{-- website telephone --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="telephone_number"
                                           class="form-label">{{ __('Website Telephone') }}</label>
                                    <input type="text" id="telephone_number" name="telephone_number"
                                           value="{{ old('telephone_number',($website->telephone_number ?? config('appInformation.telephone'))) }}"
                                           class="form-control" required>
                                </div>
                            </div>
                            {{-- end website telephone --}}

                            {{-- website phone --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="phone" class="form-label">{{ __('Website Phone') }}</label>
                                    <input type="text" id="phone" name="phone"
                                           value="{{ old('phone',($website->phone ?? config('appInformation.phone'))) }}"
                                           class="form-control" required>
                                </div>
                            </div>
                            {{-- end website phone --}}

                            {{-- website seo keyword --}}
{{--                            <div class="col-lg-6 col-md-12 col-sm-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="seo_keyword" class="form-label">{{ __('SEO Keywords') }}</label>--}}
{{--                                    <input type="text" id="seo_keyword" name="seo_keyword"--}}
{{--                                           value="{{ old('seo_keyword',($website->seo_keyword ?? ' ')) }}"--}}
{{--                                           class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            {{-- end website seo keyword --}}

                            {{-- website facebook --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="facebook" class="form-label">{{ __('Facebook') }}</label>
                                    <input type="url" id="facebook" name="facebook"
                                           value="{{ old('facebook',($website->facebook ?? ' ')) }}"
                                           class="form-control">
                                </div>
                            </div>
                            {{-- end website facebook --}}

                            {{-- website instagram --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                                    <input type="url" id="instagram" name="instagram"
                                           value="{{ old('instagram',($website->instagram ?? ' ')) }}"
                                           class="form-control">
                                </div>
                            </div>
                            {{-- end website instagram --}}

                            {{-- website whatsapp --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="whatsapp" class="form-label">{{ __('Whatsapp') }}</label>
                                    <input type="url" id="whatsapp" name="whatsapp"
                                           value="{{ old('whatsapp',($website->whatsapp ?? ' ')) }}"
                                           class="form-control">
                                </div>
                            </div>
                            {{-- end website whatsapp --}}

                            {{-- website youtube --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="youtube" class="form-label">{{ __('Youtube') }}</label>
                                    <input type="url" id="youtube" name="youtube"
                                           value="{{ old('youtube',($website->youtube ?? ' ')) }}" class="form-control">
                                </div>
                            </div>
                            {{-- end website youtube --}}

                            {{-- website twitter --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="twitter" class="form-label">{{ __('Twitter') }}</label>
                                    <input type="url" id="twitter" name="twitter"
                                           value="{{ old('twitter',($website->twitter ?? ' ')) }}" class="form-control">
                                </div>
                            </div>
                            {{-- end website twitter --}}

                            {{-- website linkedin --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="linkedin" class="form-label">{{ __('Linkedin') }}</label>
                                    <input type="url" id="linkedin" name="linkedin"
                                           value="{{ old('linkedin',($website->linkedin ?? ' ')) }}"
                                           class="form-control">
                                </div>
                            </div>
                            {{-- end website linkedin --}}

                            {{-- website behance --}}
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="behance" class="form-label">{{ __('Behance') }}</label>
                                    <input type="url" id="behance" name="behance"
                                           value="{{ old('behance',($website->behance ?? ' ')) }}" class="form-control">
                                </div>
                            </div>
                            {{-- end website behance --}}

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <button type="submit" class="btn btn-light">{{ __('Cencel') }}</button>
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
