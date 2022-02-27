@extends('layouts.main')

@section('title')
    About Me
@endsection

@section('container')
    <h1 class="mb-4">About Me</h1>
    <h4>{{ $name }}</h4>
    <h6>{{ $email }}</h6>
    <img src="assets/img/{{ $img }}" alt="{{ $name }}" width="300" height="300" class="img-thumbnail" style="border-radius: 1000%">
@endsection
