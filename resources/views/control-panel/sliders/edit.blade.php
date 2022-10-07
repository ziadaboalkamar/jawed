@extends('layout.app')
@section('title')
    {{ __('Edit Sliders') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Sliders') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <x-alert />
                        {{-- form for update services --}}
                        <form method="POST" action="{{ route('sliders.update', $slider->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- service name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Slider Title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title', $slider->title) }}" required autofocus>
                                    </div>
                                </div>
                                {{-- end service name --}}

                                {{-- service name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="sub_title" class="form-label">{{ __('Slider Sub Title') }}</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                                            value="{{ old('sub_title', $slider->sub_title) }}">
                                    </div>
                                </div>
                                {{-- end service name --}}

                                {{-- service name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="link" class="form-label">{{ __('Slider Link') }}</label>
                                        <input type="text" class="form-control" id="link" name="link"
                                            value="{{ old('link', $slider->link) }}">
                                    </div>
                                </div>
                                {{-- end service name --}}

                                {{-- service image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">{{ __('Slider Image') }}</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                            data-default-file="">
                                    </div>
                                </div>
                                {{-- end service image --}}

                                {{-- service description --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea name="description" id="description" class="form-control"
                                            rows="4">{{ old('description', $slider->description) }}</textarea>
                                    </div>
                                </div>
                                {{-- end service description --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                                </div>
                            </div>
                        </form>
                        {{-- end form --}}

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection
