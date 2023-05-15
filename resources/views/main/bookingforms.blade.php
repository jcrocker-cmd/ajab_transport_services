@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/formvalidation/dist/css/formValidation.min.css">

 @endsection

@section('content') 
    @include('main.layout.header-main')
    @include('main.layout.header2-main')
    @include('main.components.bookingforms-content')
    @include('main.layout.footer')
@endsection

@section('script')
    @include('main.assets.script')
    @include('main.assets.bootstrapjs')
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <!-- <script src="https://unpkg.com/validator@latest/validator.min.js"></script> -->
    
    <!-- <script src="/js/parsley.js"></script> -->
    
    <script src="/js/daily-bookingform-validation.js"></script>
    <script src="/js/daily-bookingform-price.js"></script>
    <script src="/js/moment-library.js"></script>
    <script src="/js/ajax-user-booking.js"></script>

@endpush
