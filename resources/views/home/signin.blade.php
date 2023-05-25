@extends('home.layout.master')

@section('title', 'AJAB | Signin')

@section('styles')
    @include('home.assets.style')
    @include('home.assets.bootstrapcss')
@endsection


@section('content') 
    @include('home.layout.header-for-logsign')
    @include('home.components.signin')
@endsection


@section('script')
    @include('home.assets.script')
@endsection