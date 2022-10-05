@extends('main.layout.master')

@section('styles')
    @include('main.assets.style')

@section('content') 
    @include('main.layout.header-for-logsign')
    @include('main.components.signin')
@endsection
