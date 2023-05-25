@extends('home.layout.master')

@section('title', 'AJAB Transport Services | Self-Drive Car Rental')

@section('styles')
    @include('home.assets.style')
    @include('home.assets.bootstrapcss')
@endsection

@section('content') 
    @include('home.layout.header')
    @include('home.components.homepage-content')
    @include('home.components.featured-content')
    @include('home.components.howitworks-content')
    @include('home.components.contactus-content')
    @include('home.layout.footer')
@endsection


@section('script')
    @include('home.assets.script')
    @include('home.assets.bootstrapjs')
@endsection

