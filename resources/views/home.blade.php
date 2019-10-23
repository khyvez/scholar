{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

@stop

@section('content')<
        @yield('content')

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        li.nav-item{
            font-weight: bold !important;
        }
        </style>
    @stop

@section('js')
<script src="/vendor/adminlte/dist/js/masked.js"></script>
@include('sweetalert::alert')
  
 @yield('script')
@stop