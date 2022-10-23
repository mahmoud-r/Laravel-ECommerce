<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/jqvmap/jqvmap.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{URL('/design/admin')}}/plugins/summernote/summernote-bs4.min.css">

    @if(LaravelLocalization::getCurrentLocale() == 'ar')

        <link rel="stylesheet" href="{{URL('/design/admin')}}/dist/css/rtl/adminlte.min.css">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{URL('/design/admin')}}/dist/css/rtl/custom.css">

        <style>
            .card-title{
                float: right;
            }
        </style>

    @elseif(LaravelLocalization::getCurrentLocale() == 'en')
        <!-- Theme style -->
        <link rel="stylesheet" href="{{URL('/design/admin')}}/dist/css/adminlte.min.css">
    @endif

    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed" rel="rtl"  lang="ar">



