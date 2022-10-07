@extends('layout.app')

@section('title')
    {{ __('Edit Photo Album') }}
@stop

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Photo Album') }}</h2>
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
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('photo-album.update', $album->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ __('Album Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $album->name) }}" required autofocus>
                                    </div>
                                </div>
                                {{-- end project title --}}


                                {{-- main image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @if ($album->image)
                                        <img src="{{ asset('storage/' . $album->image) }}" width="100"
                                            alt="{{ $album->name }}">
                                    @endif
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">{{ __('Album Main Image') }}</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                            data-default-file="">
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
