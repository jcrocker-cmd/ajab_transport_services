@extends('main.layout.master')

@section('styles')
    @include('main.assets.style')
    <!-- @include('main.assets.bootstrapcss') -->

@section('content') 
    @include('main.layout.header-for-logsign')
    @include('main.components.login')
@endsection

@section('script')
    @include('main.assets.script')
