@extends('home.layout.master')

@section('styles')
    @include('home.assets.style')
@endsection


@section('content') 
    @include('home.layout.header-for-logsign')
    @include('home.components.signin')
@endsection
