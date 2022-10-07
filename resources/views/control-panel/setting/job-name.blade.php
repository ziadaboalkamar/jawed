@extends('layout.app')
@section('title')
    {{ __('كل الوظائف') }}
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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('كل الوظائف') }}</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <x-alert />
                        <table class="jobs-list-table table">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center;">{{ __('Icon Image') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <!-- list section end -->
            </section>
            <!-- users list ends -->
        </div>

        @foreach ($jobs as $job)
        <div class="modal fade" id="modals-delete-job{{ $job->id }}">
            <div class="modal-dialog">
                <form class="create-new-nature modal-content pt-0"
                      action="{{ route('jobs.destroy',$job->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">حذف الوظيفة</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label for="username">{{__('هل انت متأكد من الحذف')}}</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary"
                                data-dismiss="modal">الغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach

        @foreach ($jobs as $job)
        <div class="modal fade" id="modals-update-job{{ $job->id }}">
            <div class="modal-dialog">
                <form class="create-new-nature modal-content pt-0"
                      action="{{ route('jobs.update',$job->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل الوظيفة</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label for="username">{{__('اسم الوظيفة')}}</label>
                            <input type="text" class="form-control"
                                   placeholder="Name"
                                   name="name" id="name" value="{{ $job->name }}" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary"
                                data-dismiss="modal">الغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach

        <div class="modal fade" id="modals-create-job">
            <div class="modal-dialog">
                <form class="create-new-nature modal-content pt-0"
                      action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة وظيفة</h5>
                    </div>
                    <div class="modal-body flex-grow-1">

                        <div class="form-group">
                            <label for="username">{{__('اسم الوظيفة')}}</label>
                            <input type="text" class="form-control"
                                   placeholder="Name"
                                   name="name" id="name" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary"
                                data-dismiss="modal">الغاء
                        </button>
                    </div>
                </form>
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


    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/emad.js') }}"></script>
    {{-- <script src="{{asset('app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script> --}}
    {{-- <script src="{{asset('app-assets/js/datatables.js')}}"></script> --}}
    <!-- END: Page JS-->

@stop
