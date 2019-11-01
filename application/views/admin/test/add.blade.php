@extends('admin.layouts.main')

@include('admin.layouts.form')

@section('content')
    {{-- {{$form['name']}} --}}
    @yield('form')

@endsection