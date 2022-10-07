/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';

    var dtUserTable = $('.user-list-table'),
        dtBlogTable = $('.blog-list-table'),
        dtReportTable = $('.reports-list-table'),
        dtPolicyTable = $('.policies-list-table'),
        dtLibraryTable = $('.libraries-list-table'),
        dtPartnersTable = $('.partners-list-table'),
        dtStatisticsTable = $('.statistics-list-table'),
        dtInitiativesTable = $('.initiatives-list-table'),
        dtProductsTable = $('.products-list-table'),
        dtVolunteersTable = $('.volunteers-list-table'),
        dtMembershipsTable = $('.memberships-list-table'),
        dtConsultationsTable = $('.consultations-list-table'),
        dtServicesTable = $('.services-list-table'),
        dtFaqsTable = $('.faqs-list-table'),
        dtClientOpinionsTable = $('.client-opinions-list-table'),
        dtPhotoAlbumTable = $('.photo-album-list-table'),
        dtTeamTable = $('.team-list-table'),
        dtSliderTable = $('.slider-list-table'),
        dtContactTable = $('.contact-list-table'),
        dtCoursesTable = $('.courses-list-table'),
        dtUsersCoursesTable = $('.users-courses-list-table'),
        dtUsersDeplomasTable = $('.users-diplomes-list-table'),
        dtDiplomaTable = $('.diplomas-list-table'),



        status = {
            0: {title: 'غير مقروءه', class: 'badge-light-danger'},
            1: {title: 'مقروءه', class: 'badge-light-success'},
        },

        statusCourse = {
            0: {title: 'غير متاحة', class: 'badge-light-danger'},
            1: {title: 'متاحة', class: 'badge-light-success'},

        },

        statusUserCourse = {
            0: {title: 'التسجيل غير مأكد', class: 'badge-light-danger'},
            1: {title: 'التسجيل مأكد', class: 'badge-light-success'},
        },

        peymentUserCourse = {
            0: {title: 'تحويل بنكي', class: 'badge-light-danger'},
            1: {title: 'دفع مباشر', class: 'badge-light-success'},
        };


    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/control-panel/users'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'full_name'},
                {data: 'email'},
                {data: 'role'},
                {data: 'phone'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/control-panel/users/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ]
        });
    }

    if (dtBlogTable.length) {
        dtBlogTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/control-panel/blogs'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'main_image', orderable: false},
                {data: 'title'},
                {data: 'sub_title'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/control-panel/blogs/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }


    if (dtReportTable.length) {
        dtReportTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [1],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtPolicyTable.length) {
        dtPolicyTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [1],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtLibraryTable.length) {
        dtLibraryTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [1],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtPartnersTable.length) {
        dtPartnersTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'name', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtStatisticsTable.length) {
        dtStatisticsTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'name', orderable: false},
                {data: 'number', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtInitiativesTable.length) {
        dtInitiativesTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'title', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtProductsTable.length) {
        dtProductsTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'name', orderable: false},
                {data: 'price', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtCoursesTable.length) {
        dtCoursesTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'name', orderable: false},
                {data: 'price', orderable: false},
                {data: 'trainer', orderable: false},
                {data: 'date', orderable: false},
                {data: 'status', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 6,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            statusCourse[$status].class +
                            '" text-capitalized>' +
                            statusCourse[$status].title +
                            '</span>'
                        );
                    }
                },
            ],
            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3, 4, 5, 6]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3, 4, 5, 6]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3, 4, 5, 6]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtDiplomaTable.length) {
        dtDiplomaTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'name', orderable: false},
                {data: 'price', orderable: false},
                {data: 'trainer', orderable: false},
                {data: 'certificate', orderable: false},
                {data: 'status', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 6,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            statusCourse[$status].class +
                            '" text-capitalized>' +
                            statusCourse[$status].title +
                            '</span>'
                        );
                    }
                },
            ],
            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3, 4, 5, 6]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3, 4, 5, 6]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3, 4, 5, 6]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtUsersCoursesTable.length) {
        dtUsersCoursesTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'status', orderable: false},
                {data: 'payment_type', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 2,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            statusUserCourse[$status].class +
                            '" text-capitalized>' +
                            statusUserCourse[$status].title +
                            '</span>'
                        );
                    }
                },
                {
                    // Slider Status
                    targets: 3,
                    render: function (data, type, full, meta) {
                        var $type = full['payment_type'];

                        return (
                            '<span class="badge badge-pill ' +
                            peymentUserCourse[$type].class +
                            '" text-capitalized>' +
                            peymentUserCourse[$type].title +
                            '</span>'
                        );
                    }
                }
            ],
            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtUsersDeplomasTable.length) {
        dtUsersDeplomasTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'status', orderable: false},
                {data: 'payment_type', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 2,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            statusUserCourse[$status].class +
                            '" text-capitalized>' +
                            statusUserCourse[$status].title +
                            '</span>'
                        );
                    }
                },
                {
                    // Slider Status
                    targets: 3,
                    render: function (data, type, full, meta) {
                        var $type = full['payment_type'];

                        return (
                            '<span class="badge badge-pill ' +
                            peymentUserCourse[$type].class +
                            '" text-capitalized>' +
                            peymentUserCourse[$type].title +
                            '</span>'
                        );
                    }
                }
            ],
            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtVolunteersTable.length) {
        dtVolunteersTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'full_name', orderable: false},
                {data: 'email', orderable: false},
                {data: 'phone', orderable: false},
                {data: 'domin', orderable: false},
                {data: 'status', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            status[$status].class +
                            '" text-capitalized>' +
                            status[$status].title +
                            '</span>'
                        );
                    }
                },
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtConsultationsTable.length) {
        dtConsultationsTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'email', orderable: false},
                {data: 'phone', orderable: false},
                {data: 'city', orderable: false},
                {data: 'status', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            status[$status].class +
                            '" text-capitalized>' +
                            status[$status].title +
                            '</span>'
                        );
                    }
                },
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtMembershipsTable.length) {
        dtMembershipsTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'city', orderable: false},
                {data: 'phone', orderable: false},
                {data: 'type', orderable: false},
                {data: 'status', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            status[$status].class +
                            '" text-capitalized>' +
                            status[$status].title +
                            '</span>'
                        );
                    }
                },
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1, 2, 3, 4, 5]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtServicesTable.length) {
        dtServicesTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'name', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtFaqsTable.length) {
        dtFaqsTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'question', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [1],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }


    if (dtClientOpinionsTable.length) {
        dtClientOpinionsTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: indexUrl,
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'record_select', orderable: false},
                {data: 'image', orderable: false},
                {data: 'name', orderable: false},
                {data: 'client_position', orderable: false},
                {data: 'actions', orderable: false}
            ],

            order: [2],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mr-2 mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                },
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

    if (dtPhotoAlbumTable.length) {
        dtPhotoAlbumTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/control-panel/photo-album'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'name'},
                {data: 'image_number'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/control-panel/photo-album/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtTeamTable.length) {
        dtTeamTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/control-panel/teams'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'name'},
                {data: 'position'},
                {data: 'actions', orderable: false}
            ],

            order: [1, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/control-panel/teams/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtSliderTable.length) {
        dtSliderTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/control-panel/sliders'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'title'},
                {data: 'sub_title'},
                {data: 'link'},
                {data: 'description'},
                {data: 'actions', orderable: false}
            ],

            order: [1, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/control-panel/sliders/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtContactTable.length) {
        dtContactTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/control-panel/contacts'
            }, // JSON file to add data
            columns: [
                // columns according to JSON

                {data: 'record_select', orderable: false},
                {data: 'name', orderable: false},
                {data: 'email', orderable: false},
                {data: 'phone', orderable: false},
                {data: 'date', orderable: false},
                {data: 'status', orderable: false},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Slider Status
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge badge-pill ' +
                            status[$status].class +
                            '" text-capitalized>' +
                            status[$status].title +
                            '</span>'
                        );
                    }
                },
            ],
            order: [4],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                }
                ,
                {
                    text: 'حذف المحدد',
                    className: 'add-new btn btn-danger mt-50',
                    attr: {
                        "id" : "bulk-delete",
                        'data-toggle': 'modal',
                        'data-target': '#modals-delete-bulk',
                        'disabled' : 'true'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                }
            ],

        });
    }

});
