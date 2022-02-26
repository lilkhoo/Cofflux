@extends('layouts.main')

<title>{{ $title }}</title>

@section('container')
    <h1>About Developer</h1>
    <h3>{{ $name }}</h3>
    <img src="{{ $image }}" alt="{{ $name }}" width="200">
@endsection





</html>
