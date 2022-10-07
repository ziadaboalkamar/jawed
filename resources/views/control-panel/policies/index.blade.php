@extends('layout.app')
@section('title')
    {{ __('اللوائح والسياسات') }}
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
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('اللوائح والسياسات') }}</h2>

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
                        <table class="policies-list-table table">
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
                                    <th>{{ __('الاسم') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <!-- list section end -->
            </section>


            <div class="modal fade" id="modals-create">
                <div class="modal-dialog">
                    <form class="create-new-nature modal-content pt-0"
                        action="{{ route('policies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">اضافة سياسة جديدة</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <label for="name">{{ __('الاسم') }}</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('الملف') }}</label>
                                <input type='file' name="file" id="file" class="form-control"  />
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
                    <form method="post" action="{{ route('policies.bulk-delete') }}" class="modal-content" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="record_ids" id="record-ids" value="[]">

                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">حذف اللوائح والسياسات</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <h4>هل تريد حذف اللوائح والسياسات المحددة؟</h4>
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
        const indexUrl = '{{ route('policies.index') }}';
    </script>
    <!-- BEGIN: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/emad.js') }}"></script>
    {{-- <script src="{{asset('app-assets/js/datatables.js')}}"></script> --}}
    <!-- END: Page JS-->

@stop
