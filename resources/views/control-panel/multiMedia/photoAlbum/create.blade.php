@extends('layout.app')
@section('title')
{{ __('Create Photo Album') }}
@stop
@section('content')


    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Create Photo Album') }}</h2>
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
                        <form method="POST" action="{{ route('photo-album.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ __('Album Name') }}</label>
                                        <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus >
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- main image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">{{ __('Album Main Image') }}</label>
                                        <input type="file" id="image" name="image" class="form-control" data-default-file="" >
                                    </div>
                                </div>
                                {{-- end main image --}}


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


@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Create Photo Album') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('photo-album.index') }}">{{ __('All Photo Album') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Multi Media') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title">{{ __('Create Photo Album') }}</h5>

            </div>
            <div class="card-body">
                {{-- alert componant --}}
                <x-alert />
                {{-- end alert component --}}

                {{-- form for store clients --}}
                <form method="POST" action="{{ route('photo-album.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- project title --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Album Name') }}</label>
                                <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus >
                            </div>
                        </div>
                        {{-- end project title --}}

                        {{-- main image --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <label for="image" class="form-label">{{ __('Album Main Image') }}</label>
                                <input type="file" id="image" name="image" class="form-control" data-default-file="" >
                            </div>
                        </div>
                        {{-- end main image --}}


                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                        </div>
                    </div>
                </form>
                {{-- end form --}}
            </div>
        </div>
    </div>
</div>

@endsection
