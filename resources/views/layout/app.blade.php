<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    @include('layout.header')


    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('layout.navbar')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('layout.slidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    @yield('content')
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('layout.footer')
<!-- END: Footer-->


@include('layout.js')
</body>
<!-- END: Body-->

</html>
