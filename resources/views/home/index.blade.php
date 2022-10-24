@extends('home.layout.master')

@section('styles')
    @include('home.assets.style')
@endsection

@section('content') 
    @include('home.layout.header')
    @include('home.components.login')
    @include('home.layout.footer2')
@endsection

@section('styles')
    @include('home.assets.script')
    @endsection