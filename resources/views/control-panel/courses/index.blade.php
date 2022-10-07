@extends('layout.app')
@section('title')
    {{ __('الدورات التدريبية') }}
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
                        <h2 class="content-header-title float-left mb-0">{{ __('الدورات التدريبية') }}</h2>

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
                        <table class="courses-list-table table">
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
                                    <th>{{ __('اسم الدورة') }}</th>
                                    <th>{{ __('رسوم الدورة') }}</th>
                                    <th>{{ __('اسم المدرب \ ـة') }}</th>
                                    <th>{{ __('تاريخ الدورة') }}</th>
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
                        action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">اضافة دورة جديدة</h5>
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
                                        <label for="name">{{ __('اسم الدورة') }}</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="period">{{ __('مدة الدورة') }}</label>
                                        <input type="text" class="form-control" value="{{ old('period') }}" name="period" id="period" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="date">{{ __('تاريخ الدورة') }}</label>
                                        <input type="date" class="form-control" value="{{ old('date') }}" name="date" id="date" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="trainer">{{ __('اسم المدرب \ ـة') }}</label>
                                        <input type="text" class="form-control" value="{{ old('trainer') }}" name="trainer" id="trainer" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="city">{{ __('المدينة') }}</label>
                                        <input type="text" class="form-control" value="{{ old('city') }}" name="city" id="city">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="price">{{ __('رسوم الدورة') }}</label>
                                        <input type="text" class="form-control" value="{{ old('price') }}" name="price" id="price" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('وصف قصير') }}</label>
                                <textarea class="form-control" rows="3" name="short_description" id="description" >{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('وصف قصير') }}</label>
                                <textarea class="form-control" rows="3" name="short_description" id="short_description" >{{ old('short_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('الوصف') }}</label>
                                <textarea class="form-control" rows="3" name="description" id="description" >{{ old('description') }}</textarea>
                            </div>
                            <script>
                                CKEDITOR.replace('description');
                            </script>


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
                    <form method="post" action="{{ route('courses.bulk-delete') }}" class="modal-content" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="record_ids" id="record-ids" value="[]">

                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">حذف الدورات</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <h4>هل تريد حذف الدورات المحددة؟</h4>
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
        const indexUrl = '{{ route('courses.index') }}';
    </script>
    <!-- BEGIN: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/emad.js') }}"></script>
    {{-- <script src="{{asset('app-assets/js/datatables.js')}}"></script> --}}
    <!-- END: Page JS-->

@stop
