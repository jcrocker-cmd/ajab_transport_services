@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
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
    <script src="/js/moment-library.js"></script>
    <script src="/js/ajax-user-booking.js"></script>
@endpush

