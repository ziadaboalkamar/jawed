<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description"
      content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords"
      content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
<title>{{ App\Models\Websit::latest()->first()->websit_title ?? 'جمعية جوِد النسائية' }} | @yield('title', 'home') </title>
<link rel="apple-touch-icon" href="{{ asset('storage/' . (App\Models\Websit::latest()->first()->favicon_image ?? '')) }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . (App\Models\Websit::latest()->first()->favicon_image ?? '')) }}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
      rel="stylesheet">



<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/bordered-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/semi-dark-layout.css')}}">



<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
<!-- END: Custom CSS-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">

<link rel="stylesheet" type="text/css"
      href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
<!-- END: Page CSS-->
<style>
    iframe{
        width: 100%;
    }
</style>

@yield('css','')
