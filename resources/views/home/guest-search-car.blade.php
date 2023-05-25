
@extends('home.layout.master')

@section('title', 'Car Rental | Search')

@section('styles')
    @include('home.assets.bootstrapcss')
    @include('home.assets.style')
    <link rel="stylesheet" href="/css/guest-nav.css">
    <link rel="stylesheet" href="/css/main-nav-2.css">
    <link rel="stylesheet" href="/css/main-home.css">
    <link rel="stylesheet" href="/css/main-viewcar.css">
 @endsection

@section('content') 
    @include('home.layout.header-for-guest')
    @include('home.layout.header2-main')
    @include('home.components.search-car-content')
    @include('home.layout.footer')
@endsection

@section('script')
    @include('home.assets.script')
    @include('home.assets.bootstrapjs')
@endsection
