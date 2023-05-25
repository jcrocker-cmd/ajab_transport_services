@extends('dashboard.layout.master')

@section('title', 'Dashboard Login')

@section('styles')
    @include('dashboard.assets.style')
@endsection

@section('content')
    @include('dashboard.components.dashboard-login-content')
@endsection

@section('scripts')
    @include('dashboard.assets.script')
@endsection


@push('styles')
    <link rel="stylesheet" href="/css/db-login.css">
@endpush
