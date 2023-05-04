@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
    <!-- End -->
 @endsection

@section('content') 
    @include('main.layout.header-main')
    @include('main.layout.header2-main')
    @include('main.components.accounts-content')
@endsection

@section('script')
    @include('main.assets.bootstrapjs')
    @include('main.assets.script')
@endsection


@push('script')
    <script src="/js/moment-library.js"></script>
    <script src="/js/ajax-user-booking.js"></script>
    <script src="/js/db-password-showhide.js"></script>
    <script src="/js/choosefile-btn-add.js"></script>
    <script src="/js/ajax-ratings.js"></script>
    <script src="/js/ajax-ratings-user-view.js"></script>
    <script src="/js/ajax-ratings-user-edit.js"></script>
@endpush



