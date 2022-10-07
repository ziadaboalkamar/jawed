@extends('layout.app')
@section('title')
{{ __('View Contact') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('View Contact') }}</h2>
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
                        <div class="row">
                            {{-- client name --}}
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <h4> {{ __('Client Name') }}</h4>
                                    <label for="name" class="form-label">{{ $contact->name }}</label>
                                </div>
                            </div>
                            {{-- end client name --}}

                            {{-- client URL --}}
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group fallback w-100">
                                    <h4> {{ __('Client Email') }}</h4>
                                    <label for="client_url" class="form-label">{{ $contact->email }}</label>
                                </div>
                            </div>
                            {{-- end client URL --}}


                            {{-- client URL --}}
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group fallback w-100">
                                    <h4> {{ __('Client Message') }}</h4>
                                    <label for="client_url" class="form-label">{{ $contact->message }}</label>
                                </div>
                            </div>
                            {{-- end client URL --}}
                        </div>

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection
