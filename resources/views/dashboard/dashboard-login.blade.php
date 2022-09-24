@extends('dashboard.layout.master')

@section('styles')
    @include('dashboard.assets.style')

@section('content')
    @include('dashboard.components.dashboard-login-content')

@section('scripts')
    @include('dashboard.assets.script')

@endsection