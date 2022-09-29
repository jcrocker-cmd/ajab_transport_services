@extends('main.layout.master')

@section('styles')
    @include('main.assets.style')

@section('content') 
    @include('main.layout.header')
    @include('main.components.login')
    @include('main.layout.footer2')
@endsection

@section('styles')
    @include('main.assets.script')