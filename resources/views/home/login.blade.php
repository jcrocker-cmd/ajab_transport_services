@extends('home.layout.master')

@section('title', 'AJAB | Login')

@section('styles')
    @include('home.assets.style')
@endsection

@section('content') 
    @include('home.layout.header-for-logsign')
    @include('home.components.login')
@endsection

@section('script')
    @include('home.assets.script')
@endsection