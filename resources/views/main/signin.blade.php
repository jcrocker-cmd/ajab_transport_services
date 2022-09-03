@extends('main.layout.master')

@section('styles')
    @include('main.assets.style')

@section('content') 
    @include('main.layout.header')
    @include('main.components.signin')
    @include('main.layout.footer2')
@endsection
