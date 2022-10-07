@extends('layout.app')
@section('title')
    {{ __('الدبلومات المهنية') }}
@stop
@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->

    <style>
        @media(min-width: 576px){
            .course-model {
                max-width: 1000px;
            }
        }
    </style>
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('الدبلومات المهنية') }}</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- meals list start -->
            <section class="app-meals-list">
                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <x-alert />
                        <table class="diplomas-list-table table">
                            <thead class="thead-light">
                                <tr>
                                    <th>
                                        <div class="animated-checkbox">
                                            <label class="m-0">
                                                <input type="checkbox" id="record__select-all">
                                                <span class="label-text"></span>
                                            </label>
                                        </div>
                                    </th>
                                    <th>{{ __('الصورة') }}</th>
                                    <th>{{ __('اسم الدبلوم') }}</th>
                                    <th>{{ __('رسوم الدبلوم') }}</th>
                                    <th>{{ __('مقدم الدبلوم') }}</th>
                                    <th>{{ __('الشهادة المعتمدة') }}</th>
                                    <th>{{ __('الحالة') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <!-- list section end -->
            </section>


            <div class="modal fade" id="modals-create">
                <div class="modal-dialog course-model">
                    <form class="create-new-nature modal-content pt-0"
                        action="{{ route('diplomas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">اضافة دبلوم جديدة</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="image">الصورة</label>
                                    <div class="form-group">

                                        <input type="file" onchange="loadFile_image(image)" name="image" id="image"
                                            class="@error("image") is-invalid @enderror" style="display:none;" />
                                        <button id="output_logo" type="button"
                                            onclick="document.getElementById('image').click();" value="emad"
                                            style="
                                                    width: 100%;
                                                    height: 150px;
                                                    border-radius: 5px;
                                                    background-color: #0a1128;
                                                    background-repeat: no-repeat;
                                                    background-size: cover;
                                                    background-position: center;
                                                    " > </button>
                                    </div>
                                    <script>
                                        var loadFile_image = function(image) {
                                            var image = document.getElementById("output_logo");
                                            var src = URL.createObjectURL(event.target.files[0]);
                                            image.style.backgroundImage = 'url(' + src + ')';
                                        };
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('اسم الدبلوم') }}</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="period">{{ __('مدة الدبلوم') }}</label>
                                        <input type="text" class="form-control" value="{{ old('period') }}" name="period" id="period" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="trainer">{{ __('مقدم الدبلوم') }}</label>
                                        <input type="text" class="form-control" value="{{ old('trainer') }}" name="trainer" id="trainer" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="certificate">{{ __('الشهادة المعتمدة') }}</label>
                                        <input type="text" class="form-control" value="{{ old('certificate') }}" name="certificate" id="certificate">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="price">{{ __('رسوم الدبلوم') }}</label>
                                        <input type="text" class="form-control" value="{{ old('price') }}" name="price" id="price" required>
                                    </div>
                                </div>
                            </div>
                            <label for="price">{{ __('اهداف الدبلوم') }}</label>
                            <div class="invoice-repeater">
                                <div data-repeater-list="goals">
                                    @forelse (old('goals') ?? [] as $goal)
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
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('وصف قصير') }}</label>
                                        <textarea class="form-control" rows="3" name="short_description" id="short_description" >{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('الوصف') }}</label>
                                        <textarea class="form-control" rows="3" name="description" id="description" >{{ old('description') }}</textarea>
                                    </div>
                                    <script>
                                        CKEDITOR.replace('description');
                                    </script>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modals-delete-bulk">
                <div class="modal-dialog">
                    <form method="post" action="{{ route('diplomas.bulk-delete') }}" class="modal-content" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="record_ids" id="record-ids" value="[]">

                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">حذف الدبلومات</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <h4>هل تريد حذف الدبلومات المحددة؟</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger mr-1 data-submit">حذف المحدد</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                            </button>
                        </div>
                    </form><!-- end of form -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <!-- END: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
    <script>
        const indexUrl = '{{ route('diplomas.index') }}';
    </script>
    <!-- BEGIN: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/emad.js') }}"></script>
    {{-- <script src="{{asset('app-assets/js/datatables.js')}}"></script> --}}
    <!-- END: Page JS-->

@stop
