@extends('layout.app')
@section('title')
{{ __('اعدادات طلبات التطوع') }}
@stop

@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{ __('اعدادات طلبات التطوع') }}</h2>
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
                    <form action="{{ route('memdership-description') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="goals">{{ __('الاهداف') }}</label>
                                    <textarea class="form-control" rows="3" name="goals" id="goals">{{ old('goals',$membership->goals ?? '') }}</textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('goals');
                                </script>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="features">{{ __('المميزات') }}</label>
                                    <textarea class="form-control" rows="3" name="features" id="features">{{ old('features',$membership->features ?? '') }}</textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('features');
                                </script>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label for="features">{{ __('انواع العضوية') }}</label>
                                <div class="invoice-repeater">
                                    <div data-repeater-list="types">
                                        @forelse (old('types') ?? [] as $goal)
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-10 col-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" value="{{ $goal['name'] }}" name="name" aria-describedby="name" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-12 mb-50">
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                            <i data-feather="x" class="mr-25"></i>
                                                            <span>حذف</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                        @empty
                                            @php
                                                if($membership->types)
                                                    $types = json_decode($membership->types);
                                                else {
                                                     $types = [];
                                                }

                                            @endphp
                                            @forelse ($types ?? [] as $goal)
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-10 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="name" value="{{ $goal }}" name="name" aria-describedby="name" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="form-group">
                                                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                    <i data-feather="x" class="mr-25"></i>
                                                                    <span>حذف</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                </div>
                                            @empty
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-10 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="name" id="name" aria-describedby="goal" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="form-group">
                                                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                    <i data-feather="x" class="mr-25"></i>
                                                                    <span>حذف</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                </div>
                                            @endforelse
                                        @endforelse

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                <i data-feather="plus" class="mr-25"></i>
                                                <span>اضافة جديد</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
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
