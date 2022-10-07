@extends('layout.app')
@section('title')
    {{ __('Edit Team Member') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Team Member') }}</h2>
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
                        {{-- form for update clients --}}
                        <form method="POST" action="{{ route('teams.update', $team->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- client name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ __('Member Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $team->name) }}" required autofocus>
                                    </div>
                                </div>
                                {{-- end client name --}}

                                {{-- client image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        @if ($team->image)
                                            <img src="{{ asset('storage/' . $team->image) }}" width="50"
                                                alt="{{ $team->name }}">
                                        @endif
                                        <label for="image" class="form-label">{{ __('Member Image') }}</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                            data-default-file="">
                                    </div>
                                </div>
                                {{-- end client image --}}

                                {{-- client URL --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="position" class="form-label">{{ __('Member Position') }}</label>
                                        <input type="text" id="position" name="position"
                                            value="{{ old('position', $team->position) }}" class="form-control"
                                            data-default-file="" required>
                                    </div>
                                </div>
                                {{-- end client URL --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
